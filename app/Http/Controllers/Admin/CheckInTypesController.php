<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCheckInTypeRequest;
use App\Http\Requests\StoreCheckInTypeRequest;
use App\Http\Requests\UpdateCheckInTypeRequest;
use App\Models\CheckInType;
use App\Models\Team;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CheckInTypesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('check_in_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CheckInType::with(['team'])->select(sprintf('%s.*', (new CheckInType)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'check_in_type_show';
                $editGate      = 'check_in_type_edit';
                $deleteGate    = 'check_in_type_delete';
                $crudRoutePart = 'check-in-types';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('check_in_type', function ($row) {
                return $row->check_in_type ? $row->check_in_type : '';
            });
            $table->editColumn('notes', function ($row) {
                return $row->notes ? $row->notes : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        $teams = Team::get();

        return view('admin.checkInTypes.index', compact('teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('check_in_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.checkInTypes.create');
    }

    public function store(StoreCheckInTypeRequest $request)
    {
        $checkInType = CheckInType::create($request->all());

        return redirect()->route('admin.check-in-types.index');
    }

    public function edit(CheckInType $checkInType)
    {
        abort_if(Gate::denies('check_in_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checkInType->load('team');

        return view('admin.checkInTypes.edit', compact('checkInType'));
    }

    public function update(UpdateCheckInTypeRequest $request, CheckInType $checkInType)
    {
        $checkInType->update($request->all());

        return redirect()->route('admin.check-in-types.index');
    }

    public function show(CheckInType $checkInType)
    {
        abort_if(Gate::denies('check_in_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checkInType->load('team', 'typeCheckIns');

        return view('admin.checkInTypes.show', compact('checkInType'));
    }

    public function destroy(CheckInType $checkInType)
    {
        abort_if(Gate::denies('check_in_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checkInType->delete();

        return back();
    }

    public function massDestroy(MassDestroyCheckInTypeRequest $request)
    {
        $checkInTypes = CheckInType::find(request('ids'));

        foreach ($checkInTypes as $checkInType) {
            $checkInType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

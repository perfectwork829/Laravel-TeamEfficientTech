<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCheckInRequest;
use App\Http\Requests\StoreCheckInRequest;
use App\Http\Requests\UpdateCheckInRequest;
use App\Models\CheckIn;
use App\Models\CheckInType;
use App\Models\Team;
use App\Models\TimeProject;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CheckInController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('check_in_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = Auth::user();

        if ($user->roles->pluck('id')->containsAny([1, 3])) {
            $query = CheckIn::with(['user', 'type', 'project', 'team'])->select(sprintf('%s.*', (new CheckIn)->table));
        } else {
            $query = CheckIn::with(['user', 'type', 'project', 'team'])->where('user_id', $user->id)->select(sprintf('%s.*', (new CheckIn)->table));
        }

        if ($request->ajax()) {
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'check_in_show';
                $editGate      = 'check_in_edit';
                $deleteGate    = 'check_in_delete';
                $crudRoutePart = 'check-ins';

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
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->addColumn('type_check_in_type', function ($row) {
                return $row->type ? $row->type->check_in_type : '';
            });

            $table->addColumn('project_name', function ($row) {
                return $row->project ? $row->project->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'type', 'project']);

            return $table->make(true);
        }

        $users          = User::get();
        $check_in_types = CheckInType::get();
        $time_projects  = TimeProject::get();
        $teams          = Team::get();

        return view('admin.checkIns.index', compact('users', 'check_in_types', 'time_projects', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('check_in_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $types = CheckInType::pluck('check_in_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = TimeProject::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.checkIns.create', compact('projects', 'types', 'users'));
    }

    public function store(StoreCheckInRequest $request)
    {
        $checkIn = CheckIn::create($request->all());

        return redirect()->route('admin.check-ins.index');
    }

    public function edit(CheckIn $checkIn)
    {
        abort_if(Gate::denies('check_in_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $types = CheckInType::pluck('check_in_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = TimeProject::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $checkIn->load('user', 'type', 'project', 'team');

        return view('admin.checkIns.edit', compact('checkIn', 'projects', 'types', 'users'));
    }

    public function update(UpdateCheckInRequest $request, CheckIn $checkIn)
    {
        $checkIn->update($request->all());

        return redirect()->route('admin.check-ins.index');
    }

    public function show(CheckIn $checkIn)
    {
        abort_if(Gate::denies('check_in_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    
        $user = Auth::user();
    
        if (!$user->roles->pluck('id')->containsAny([1, 3]) && $checkIn->user_id !== $user->id) {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    
        $checkIn->load('user', 'type', 'project', 'team');
    
        return view('admin.checkIns.show', compact('checkIn'));
    }

    public function destroy(CheckIn $checkIn)
    {
        abort_if(Gate::denies('check_in_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checkIn->delete();

        return back();
    }

    public function massDestroy(MassDestroyCheckInRequest $request)
    {
        $checkIns = CheckIn::find(request('ids'));

        foreach ($checkIns as $checkIn) {
            $checkIn->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

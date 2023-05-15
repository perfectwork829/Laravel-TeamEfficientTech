<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTrackingRequest;
use App\Http\Requests\StoreTrackingRequest;
use App\Http\Requests\UpdateTrackingRequest;
use App\Models\Tracking;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TrackingController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('tracking_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Tracking::with(['user', 'team'])->select(sprintf('%s.*', (new Tracking)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'tracking_show';
                $editGate      = 'tracking_edit';
                $deleteGate    = 'tracking_delete';
                $crudRoutePart = 'trackings';

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
            $table->editColumn('lat', function ($row) {
                return $row->lat ? $row->lat : '';
            });
            $table->editColumn('lon', function ($row) {
                return $row->lon ? $row->lon : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('action', function ($row) {
                return $row->action ? Tracking::ACTION_SELECT[$row->action] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }

        return view('admin.trackings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('tracking_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.trackings.create', compact('users'));
    }

    public function store(StoreTrackingRequest $request)
    {
        $tracking = Tracking::create($request->all());

        return redirect()->route('admin.trackings.index');
    }

    public function edit(Tracking $tracking)
    {
        abort_if(Gate::denies('tracking_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tracking->load('user', 'team');

        return view('admin.trackings.edit', compact('tracking', 'users'));
    }

    public function update(UpdateTrackingRequest $request, Tracking $tracking)
    {
        $tracking->update($request->all());

        return redirect()->route('admin.trackings.index');
    }

    public function show(Tracking $tracking)
    {
        abort_if(Gate::denies('tracking_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tracking->load('user', 'team');

        return view('admin.trackings.show', compact('tracking'));
    }

    public function destroy(Tracking $tracking)
    {
        abort_if(Gate::denies('tracking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tracking->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrackingRequest $request)
    {
        $trackings = Tracking::find(request('ids'));

        foreach ($trackings as $tracking) {
            $tracking->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

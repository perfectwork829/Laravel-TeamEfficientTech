<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserDashboardRequest;
use App\Http\Requests\StoreUserDashboardRequest;
use App\Http\Requests\UpdateUserDashboardRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserDashboardController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_dashboard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userDashboards.index');
    }

    public function create()
    {
        abort_if(Gate::denies('user_dashboard_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userDashboards.create');
    }

    public function store(StoreUserDashboardRequest $request)
    {
        $userDashboard = UserDashboard::create($request->all());

        return redirect()->route('admin.user-dashboards.index');
    }

    public function edit(UserDashboard $userDashboard)
    {
        abort_if(Gate::denies('user_dashboard_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userDashboards.edit', compact('userDashboard'));
    }

    public function update(UpdateUserDashboardRequest $request, UserDashboard $userDashboard)
    {
        $userDashboard->update($request->all());

        return redirect()->route('admin.user-dashboards.index');
    }

    public function show(UserDashboard $userDashboard)
    {
        abort_if(Gate::denies('user_dashboard_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userDashboards.show', compact('userDashboard'));
    }

    public function destroy(UserDashboard $userDashboard)
    {
        abort_if(Gate::denies('user_dashboard_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userDashboard->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserDashboardRequest $request)
    {
        $userDashboards = UserDashboard::find(request('ids'));

        foreach ($userDashboards as $userDashboard) {
            $userDashboard->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

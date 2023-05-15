<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserNotificationRequest;
use App\Http\Requests\StoreUserNotificationRequest;
use App\Http\Requests\UpdateUserNotificationRequest;
use App\Models\UserNotification;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserNotificationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_notification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userNotifications = UserNotification::all();

        return view('admin.userNotifications.index', compact('userNotifications'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_notification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userNotifications.create');
    }

    public function store(StoreUserNotificationRequest $request)
    {
        $userNotification = UserNotification::create($request->all());

        return redirect()->route('admin.user-notifications.index');
    }

    public function edit(UserNotification $userNotification)
    {
        abort_if(Gate::denies('user_notification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userNotifications.edit', compact('userNotification'));
    }

    public function update(UpdateUserNotificationRequest $request, UserNotification $userNotification)
    {
        $userNotification->update($request->all());

        return redirect()->route('admin.user-notifications.index');
    }

    public function show(UserNotification $userNotification)
    {
        abort_if(Gate::denies('user_notification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userNotifications.show', compact('userNotification'));
    }

    public function destroy(UserNotification $userNotification)
    {
        abort_if(Gate::denies('user_notification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userNotification->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserNotificationRequest $request)
    {
        $userNotifications = UserNotification::find(request('ids'));

        foreach ($userNotifications as $userNotification) {
            $userNotification->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

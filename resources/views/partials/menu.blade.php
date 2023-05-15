<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_dashboard_access')
                <li class="{{ request()->is("admin/user-dashboards") || request()->is("admin/user-dashboards/*") ? "active" : "" }}">
                    <a href="{{ route("admin.user-dashboards.index") }}">
                        <i class="fa-fw fas fa-chart-line">

                        </i>
                        <span>{{ trans('cruds.userDashboard.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('user_alert_access')
                <li class="{{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                    <a href="{{ route("admin.user-alerts.index") }}">
                        <i class="fa-fw fas fa-bell">

                        </i>
                        <span>{{ trans('cruds.userAlert.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('check_in_access')
                <li class="{{ request()->is("admin/check-ins") || request()->is("admin/check-ins/*") ? "active" : "" }}">
                    <a href="{{ route("admin.check-ins.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.checkIn.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('time_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-clock">

                        </i>
                        <span>{{ trans('cruds.timeManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('time_work_type_access')
                            <li class="{{ request()->is("admin/time-work-types") || request()->is("admin/time-work-types/*") ? "active" : "" }}">
                                <a href="{{ route("admin.time-work-types.index") }}">
                                    <i class="fa-fw fas fa-th">

                                    </i>
                                    <span>{{ trans('cruds.timeWorkType.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('time_project_access')
                            <li class="{{ request()->is("admin/time-projects") || request()->is("admin/time-projects/*") ? "active" : "" }}">
                                <a href="{{ route("admin.time-projects.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.timeProject.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('time_entry_access')
                            <li class="{{ request()->is("admin/time-entries") || request()->is("admin/time-entries/*") ? "active" : "" }}">
                                <a href="{{ route("admin.time-entries.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.timeEntry.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('time_report_access')
                            <li class="{{ request()->is("admin/time-reports") || request()->is("admin/time-reports/*") ? "active" : "" }}">
                                <a href="{{ route("admin.time-reports.index") }}">
                                    <i class="fa-fw fas fa-chart-line">

                                    </i>
                                    <span>{{ trans('cruds.timeReport.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('task_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-list">

                        </i>
                        <span>{{ trans('cruds.taskManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('task_access')
                            <li class="{{ request()->is("admin/tasks") || request()->is("admin/tasks/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tasks.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.task.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('task_access')
                            <li class="{{ request()->is("tasks/view/daily_task") || request()->is("tasks/view/daily_task/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tasks.dailyTask") }}">
                                    <i class="fa-fw fas fa-tasks">
                                    </i>
                                    <span>{{ trans('cruds.task.task_daily') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('task_access')
                            <li class="{{ request()->is("tasks/view/paycheck") || request()->is("tasks/view/paycheck/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tasks.payCheck") }}">
                                    <i class="fa-fw fas fa-credit-card">
                                    </i>
                                    <span>{{ trans('cruds.task.payCheck') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('tasks_calendar_access')
                            <li class="{{ request()->is("admin/tasks-calendars") || request()->is("admin/tasks-calendars/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tasks-calendars.index") }}">
                                    <i class="fa-fw fas fa-calendar">

                                    </i>
                                    <span>{{ trans('cruds.tasksCalendar.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('expense_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-money-bill">

                        </i>
                        <span>{{ trans('cruds.expenseManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('expense_category_access')
                            <li class="{{ request()->is("admin/expense-categories") || request()->is("admin/expense-categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.expense-categories.index") }}">
                                    <i class="fa-fw fas fa-list">

                                    </i>
                                    <span>{{ trans('cruds.expenseCategory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('income_category_access')
                            <li class="{{ request()->is("admin/income-categories") || request()->is("admin/income-categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.income-categories.index") }}">
                                    <i class="fa-fw fas fa-list">

                                    </i>
                                    <span>{{ trans('cruds.incomeCategory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('expense_access')
                            <li class="{{ request()->is("admin/expenses") || request()->is("admin/expenses/*") ? "active" : "" }}">
                                <a href="{{ route("admin.expenses.index") }}">
                                    <i class="fa-fw fas fa-arrow-circle-right">

                                    </i>
                                    <span>{{ trans('cruds.expense.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('income_access')
                            <li class="{{ request()->is("admin/incomes") || request()->is("admin/incomes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.incomes.index") }}">
                                    <i class="fa-fw fas fa-arrow-circle-right">

                                    </i>
                                    <span>{{ trans('cruds.income.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('expense_report_access')
                            <li class="{{ request()->is("admin/expense-reports") || request()->is("admin/expense-reports/*") ? "active" : "" }}">
                                <a href="{{ route("admin.expense-reports.index") }}">
                                    <i class="fa-fw fas fa-chart-line">

                                    </i>
                                    <span>{{ trans('cruds.expenseReport.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('setting_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.setting.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('team_access')
                            <li class="{{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "active" : "" }}">
                                <a href="{{ route("admin.teams.index") }}">
                                    <i class="fa-fw fas fa-users">

                                    </i>
                                    <span>{{ trans('cruds.team.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('check_in_type_access')
                            <li class="{{ request()->is("admin/check-in-types") || request()->is("admin/check-in-types/*") ? "active" : "" }}">
                                <a href="{{ route("admin.check-in-types.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.checkInType.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('task_status_access')
                            <li class="{{ request()->is("admin/task-statuses") || request()->is("admin/task-statuses/*") ? "active" : "" }}">
                                <a href="{{ route("admin.task-statuses.index") }}">
                                    <i class="fa-fw fas fa-server">

                                    </i>
                                    <span>{{ trans('cruds.taskStatus.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('task_tag_access')
                            <li class="{{ request()->is("admin/task-tags") || request()->is("admin/task-tags/*") ? "active" : "" }}">
                                <a href="{{ route("admin.task-tags.index") }}">
                                    <i class="fa-fw fas fa-server">

                                    </i>
                                    <span>{{ trans('cruds.taskTag.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('data_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-table">

                        </i>
                        <span>{{ trans('cruds.dataManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('employee_access')
                            <li class="{{ request()->is("admin/employees") || request()->is("admin/employees/*") ? "active" : "" }}">
                                <a href="{{ route("admin.employees.index") }}">
                                    <i class="fa-fw far fa-user">

                                    </i>
                                    <span>{{ trans('cruds.employee.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="{{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('tracking_access')
                            <li class="{{ request()->is("admin/trackings") || request()->is("admin/trackings/*") ? "active" : "" }}">
                                <a href="{{ route("admin.trackings.index") }}">
                                    <i class="fa-fw fas fa-location-arrow">

                                    </i>
                                    <span>{{ trans('cruds.tracking.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_notification_access')
                            <li class="{{ request()->is("admin/user-notifications") || request()->is("admin/user-notifications/*") ? "active" : "" }}">
                                <a href="{{ route("admin.user-notifications.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.userNotification.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @php($unread = \App\Models\QaTopic::unreadCount())
                <li class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }}">
                    <a href="{{ route("admin.messenger.index") }}">
                        <i class="fa-fw fa fa-envelope">

                        </i>
                        <span>{{ trans('global.messages') }}</span>
                        @if($unread > 0)
                            <strong>( {{ $unread }} )</strong>
                        @endif

                    </a>
                </li>
                @if(\Illuminate\Support\Facades\Schema::hasColumn('teams', 'owner_id') && \App\Models\Team::where('owner_id', auth()->user()->id)->exists())
                    <li class="nav-item">
                        <a class="{{ request()->is("admin/team-members") || request()->is("admin/team-members/*") ? "active" : "" }}" href="{{ route("admin.team-members.index") }}">
                            <i class="fa-fw fa fa-users">
                            </i>
                            <span>{{ trans("global.team-members") }}</span>
                        </a>
                    </li>
                @endif
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                            <a href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key">
                                </i>
                                {{ trans('global.change_password') }}
                            </a>
                        </li>
                    @endcan
                @endif
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="fas fa-fw fa-sign-out-alt">

                        </i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
        </ul>
    </section>
</aside>
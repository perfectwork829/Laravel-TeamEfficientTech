<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="<?php echo e(route("admin.home")); ?>">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    <?php echo e(trans('global.dashboard')); ?>

                </a>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_dashboard_access')): ?>
                <li class="<?php echo e(request()->is("admin/user-dashboards") || request()->is("admin/user-dashboards/*") ? "active" : ""); ?>">
                    <a href="<?php echo e(route("admin.user-dashboards.index")); ?>">
                        <i class="fa-fw fas fa-chart-line">

                        </i>
                        <span><?php echo e(trans('cruds.userDashboard.title')); ?></span>

                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_alert_access')): ?>
                <li class="<?php echo e(request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : ""); ?>">
                    <a href="<?php echo e(route("admin.user-alerts.index")); ?>">
                        <i class="fa-fw fas fa-bell">

                        </i>
                        <span><?php echo e(trans('cruds.userAlert.title')); ?></span>

                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('check_in_access')): ?>
                <li class="<?php echo e(request()->is("admin/check-ins") || request()->is("admin/check-ins/*") ? "active" : ""); ?>">
                    <a href="<?php echo e(route("admin.check-ins.index")); ?>">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span><?php echo e(trans('cruds.checkIn.title')); ?></span>

                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('time_management_access')): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-clock">

                        </i>
                        <span><?php echo e(trans('cruds.timeManagement.title')); ?></span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('time_work_type_access')): ?>
                            <li class="<?php echo e(request()->is("admin/time-work-types") || request()->is("admin/time-work-types/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.time-work-types.index")); ?>">
                                    <i class="fa-fw fas fa-th">

                                    </i>
                                    <span><?php echo e(trans('cruds.timeWorkType.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('time_project_access')): ?>
                            <li class="<?php echo e(request()->is("admin/time-projects") || request()->is("admin/time-projects/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.time-projects.index")); ?>">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span><?php echo e(trans('cruds.timeProject.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('time_entry_access')): ?>
                            <li class="<?php echo e(request()->is("admin/time-entries") || request()->is("admin/time-entries/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.time-entries.index")); ?>">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span><?php echo e(trans('cruds.timeEntry.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('time_report_access')): ?>
                            <li class="<?php echo e(request()->is("admin/time-reports") || request()->is("admin/time-reports/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.time-reports.index")); ?>">
                                    <i class="fa-fw fas fa-chart-line">

                                    </i>
                                    <span><?php echo e(trans('cruds.timeReport.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task_management_access')): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-list">

                        </i>
                        <span><?php echo e(trans('cruds.taskManagement.title')); ?></span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task_access')): ?>
                            <li class="<?php echo e(request()->is("admin/tasks") || request()->is("admin/tasks/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.tasks.index")); ?>">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span><?php echo e(trans('cruds.task.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tasks_calendar_access')): ?>
                            <li class="<?php echo e(request()->is("admin/tasks-calendars") || request()->is("admin/tasks-calendars/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.tasks-calendars.index")); ?>">
                                    <i class="fa-fw fas fa-calendar">

                                    </i>
                                    <span><?php echo e(trans('cruds.tasksCalendar.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense_management_access')): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-money-bill">

                        </i>
                        <span><?php echo e(trans('cruds.expenseManagement.title')); ?></span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense_category_access')): ?>
                            <li class="<?php echo e(request()->is("admin/expense-categories") || request()->is("admin/expense-categories/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.expense-categories.index")); ?>">
                                    <i class="fa-fw fas fa-list">

                                    </i>
                                    <span><?php echo e(trans('cruds.expenseCategory.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('income_category_access')): ?>
                            <li class="<?php echo e(request()->is("admin/income-categories") || request()->is("admin/income-categories/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.income-categories.index")); ?>">
                                    <i class="fa-fw fas fa-list">

                                    </i>
                                    <span><?php echo e(trans('cruds.incomeCategory.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense_access')): ?>
                            <li class="<?php echo e(request()->is("admin/expenses") || request()->is("admin/expenses/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.expenses.index")); ?>">
                                    <i class="fa-fw fas fa-arrow-circle-right">

                                    </i>
                                    <span><?php echo e(trans('cruds.expense.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('income_access')): ?>
                            <li class="<?php echo e(request()->is("admin/incomes") || request()->is("admin/incomes/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.incomes.index")); ?>">
                                    <i class="fa-fw fas fa-arrow-circle-right">

                                    </i>
                                    <span><?php echo e(trans('cruds.income.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense_report_access')): ?>
                            <li class="<?php echo e(request()->is("admin/expense-reports") || request()->is("admin/expense-reports/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.expense-reports.index")); ?>">
                                    <i class="fa-fw fas fa-chart-line">

                                    </i>
                                    <span><?php echo e(trans('cruds.expenseReport.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('setting_access')): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span><?php echo e(trans('cruds.setting.title')); ?></span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_access')): ?>
                            <li class="<?php echo e(request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.permissions.index")); ?>">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span><?php echo e(trans('cruds.permission.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_access')): ?>
                            <li class="<?php echo e(request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.roles.index")); ?>">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span><?php echo e(trans('cruds.role.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
                            <li class="<?php echo e(request()->is("admin/users") || request()->is("admin/users/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.users.index")); ?>">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span><?php echo e(trans('cruds.user.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('team_access')): ?>
                            <li class="<?php echo e(request()->is("admin/teams") || request()->is("admin/teams/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.teams.index")); ?>">
                                    <i class="fa-fw fas fa-users">

                                    </i>
                                    <span><?php echo e(trans('cruds.team.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('check_in_type_access')): ?>
                            <li class="<?php echo e(request()->is("admin/check-in-types") || request()->is("admin/check-in-types/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.check-in-types.index")); ?>">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span><?php echo e(trans('cruds.checkInType.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task_status_access')): ?>
                            <li class="<?php echo e(request()->is("admin/task-statuses") || request()->is("admin/task-statuses/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.task-statuses.index")); ?>">
                                    <i class="fa-fw fas fa-server">

                                    </i>
                                    <span><?php echo e(trans('cruds.taskStatus.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task_tag_access')): ?>
                            <li class="<?php echo e(request()->is("admin/task-tags") || request()->is("admin/task-tags/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.task-tags.index")); ?>">
                                    <i class="fa-fw fas fa-server">

                                    </i>
                                    <span><?php echo e(trans('cruds.taskTag.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('data_management_access')): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-table">

                        </i>
                        <span><?php echo e(trans('cruds.dataManagement.title')); ?></span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee_access')): ?>
                            <li class="<?php echo e(request()->is("admin/employees") || request()->is("admin/employees/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.employees.index")); ?>">
                                    <i class="fa-fw far fa-user">

                                    </i>
                                    <span><?php echo e(trans('cruds.employee.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('audit_log_access')): ?>
                            <li class="<?php echo e(request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.audit-logs.index")); ?>">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span><?php echo e(trans('cruds.auditLog.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tracking_access')): ?>
                            <li class="<?php echo e(request()->is("admin/trackings") || request()->is("admin/trackings/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.trackings.index")); ?>">
                                    <i class="fa-fw fas fa-location-arrow">

                                    </i>
                                    <span><?php echo e(trans('cruds.tracking.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_notification_access')): ?>
                            <li class="<?php echo e(request()->is("admin/user-notifications") || request()->is("admin/user-notifications/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.user-notifications.index")); ?>">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span><?php echo e(trans('cruds.userNotification.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php ($unread = \App\Models\QaTopic::unreadCount()); ?>
                <li class="<?php echo e(request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : ""); ?>">
                    <a href="<?php echo e(route("admin.messenger.index")); ?>">
                        <i class="fa-fw fa fa-envelope">

                        </i>
                        <span><?php echo e(trans('global.messages')); ?></span>
                        <?php if($unread > 0): ?>
                            <strong>( <?php echo e($unread); ?> )</strong>
                        <?php endif; ?>

                    </a>
                </li>
                <?php if(\Illuminate\Support\Facades\Schema::hasColumn('teams', 'owner_id') && \App\Models\Team::where('owner_id', auth()->user()->id)->exists()): ?>
                    <li class="nav-item">
                        <a class="<?php echo e(request()->is("admin/team-members") || request()->is("admin/team-members/*") ? "active" : ""); ?>" href="<?php echo e(route("admin.team-members.index")); ?>">
                            <i class="fa-fw fa fa-users">
                            </i>
                            <span><?php echo e(trans("global.team-members")); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('profile_password_edit')): ?>
                        <li class="<?php echo e(request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('profile.password.edit')); ?>">
                                <i class="fa-fw fas fa-key">
                                </i>
                                <?php echo e(trans('global.change_password')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="fas fa-fw fa-sign-out-alt">

                        </i>
                        <?php echo e(trans('global.logout')); ?>

                    </a>
                </li>
        </ul>
    </section>
</aside><?php /**PATH /home/teameffi/public_html/app.teamefficienttech.com/resources/views/partials/menu.blade.php ENDPATH**/ ?>
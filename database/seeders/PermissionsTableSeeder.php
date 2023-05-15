<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'team_create',
            ],
            [
                'id'    => 18,
                'title' => 'team_edit',
            ],
            [
                'id'    => 19,
                'title' => 'team_show',
            ],
            [
                'id'    => 20,
                'title' => 'team_delete',
            ],
            [
                'id'    => 21,
                'title' => 'team_access',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 23,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 24,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 25,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 26,
                'title' => 'time_management_access',
            ],
            [
                'id'    => 27,
                'title' => 'time_work_type_create',
            ],
            [
                'id'    => 28,
                'title' => 'time_work_type_edit',
            ],
            [
                'id'    => 29,
                'title' => 'time_work_type_show',
            ],
            [
                'id'    => 30,
                'title' => 'time_work_type_delete',
            ],
            [
                'id'    => 31,
                'title' => 'time_work_type_access',
            ],
            [
                'id'    => 32,
                'title' => 'time_project_create',
            ],
            [
                'id'    => 33,
                'title' => 'time_project_edit',
            ],
            [
                'id'    => 34,
                'title' => 'time_project_show',
            ],
            [
                'id'    => 35,
                'title' => 'time_project_delete',
            ],
            [
                'id'    => 36,
                'title' => 'time_project_access',
            ],
            [
                'id'    => 37,
                'title' => 'time_entry_create',
            ],
            [
                'id'    => 38,
                'title' => 'time_entry_edit',
            ],
            [
                'id'    => 39,
                'title' => 'time_entry_show',
            ],
            [
                'id'    => 40,
                'title' => 'time_entry_delete',
            ],
            [
                'id'    => 41,
                'title' => 'time_entry_access',
            ],
            [
                'id'    => 42,
                'title' => 'time_report_create',
            ],
            [
                'id'    => 43,
                'title' => 'time_report_edit',
            ],
            [
                'id'    => 44,
                'title' => 'time_report_show',
            ],
            [
                'id'    => 45,
                'title' => 'time_report_delete',
            ],
            [
                'id'    => 46,
                'title' => 'time_report_access',
            ],
            [
                'id'    => 47,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 48,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 49,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 50,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 51,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 52,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 53,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 54,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 55,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 56,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 57,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 58,
                'title' => 'expense_create',
            ],
            [
                'id'    => 59,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 60,
                'title' => 'expense_show',
            ],
            [
                'id'    => 61,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 62,
                'title' => 'expense_access',
            ],
            [
                'id'    => 63,
                'title' => 'income_create',
            ],
            [
                'id'    => 64,
                'title' => 'income_edit',
            ],
            [
                'id'    => 65,
                'title' => 'income_show',
            ],
            [
                'id'    => 66,
                'title' => 'income_delete',
            ],
            [
                'id'    => 67,
                'title' => 'income_access',
            ],
            [
                'id'    => 68,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 69,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 70,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 71,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 72,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 73,
                'title' => 'employee_create',
            ],
            [
                'id'    => 74,
                'title' => 'employee_edit',
            ],
            [
                'id'    => 75,
                'title' => 'employee_show',
            ],
            [
                'id'    => 76,
                'title' => 'employee_delete',
            ],
            [
                'id'    => 77,
                'title' => 'employee_access',
            ],
            [
                'id'    => 78,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 79,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 80,
                'title' => 'tracking_create',
            ],
            [
                'id'    => 81,
                'title' => 'tracking_edit',
            ],
            [
                'id'    => 82,
                'title' => 'tracking_show',
            ],
            [
                'id'    => 83,
                'title' => 'tracking_delete',
            ],
            [
                'id'    => 84,
                'title' => 'tracking_access',
            ],
            [
                'id'    => 85,
                'title' => 'check_in_create',
            ],
            [
                'id'    => 86,
                'title' => 'check_in_edit',
            ],
            [
                'id'    => 87,
                'title' => 'check_in_show',
            ],
            [
                'id'    => 88,
                'title' => 'check_in_delete',
            ],
            [
                'id'    => 89,
                'title' => 'check_in_access',
            ],
            [
                'id'    => 90,
                'title' => 'check_in_type_create',
            ],
            [
                'id'    => 91,
                'title' => 'check_in_type_edit',
            ],
            [
                'id'    => 92,
                'title' => 'check_in_type_show',
            ],
            [
                'id'    => 93,
                'title' => 'check_in_type_delete',
            ],
            [
                'id'    => 94,
                'title' => 'check_in_type_access',
            ],
            [
                'id'    => 95,
                'title' => 'setting_access',
            ],
            [
                'id'    => 96,
                'title' => 'data_management_access',
            ],
            [
                'id'    => 97,
                'title' => 'user_dashboard_create',
            ],
            [
                'id'    => 98,
                'title' => 'user_dashboard_edit',
            ],
            [
                'id'    => 99,
                'title' => 'user_dashboard_show',
            ],
            [
                'id'    => 100,
                'title' => 'user_dashboard_delete',
            ],
            [
                'id'    => 101,
                'title' => 'user_dashboard_access',
            ],
            [
                'id'    => 102,
                'title' => 'user_notification_create',
            ],
            [
                'id'    => 103,
                'title' => 'user_notification_edit',
            ],
            [
                'id'    => 104,
                'title' => 'user_notification_show',
            ],
            [
                'id'    => 105,
                'title' => 'user_notification_delete',
            ],
            [
                'id'    => 106,
                'title' => 'user_notification_access',
            ],
            [
                'id'    => 107,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 108,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 109,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 110,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 111,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 112,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 113,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 114,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 115,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 116,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 117,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 118,
                'title' => 'task_create',
            ],
            [
                'id'    => 119,
                'title' => 'task_edit',
            ],
            [
                'id'    => 120,
                'title' => 'task_show',
            ],
            [
                'id'    => 121,
                'title' => 'task_delete',
            ],
            [
                'id'    => 122,
                'title' => 'task_access',
            ],
            [
                'id'    => 123,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 124,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}

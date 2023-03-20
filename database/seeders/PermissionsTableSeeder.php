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
                'title' => 'monitor_project_access',
            ],
            [
                'id'    => 18,
                'title' => 'status_create',
            ],
            [
                'id'    => 19,
                'title' => 'status_edit',
            ],
            [
                'id'    => 20,
                'title' => 'status_show',
            ],
            [
                'id'    => 21,
                'title' => 'status_delete',
            ],
            [
                'id'    => 22,
                'title' => 'status_access',
            ],
            [
                'id'    => 23,
                'title' => 'job_type_create',
            ],
            [
                'id'    => 24,
                'title' => 'job_type_edit',
            ],
            [
                'id'    => 25,
                'title' => 'job_type_show',
            ],
            [
                'id'    => 26,
                'title' => 'job_type_delete',
            ],
            [
                'id'    => 27,
                'title' => 'job_type_access',
            ],
            [
                'id'    => 28,
                'title' => 'ctergorize_priority_create',
            ],
            [
                'id'    => 29,
                'title' => 'ctergorize_priority_edit',
            ],
            [
                'id'    => 30,
                'title' => 'ctergorize_priority_show',
            ],
            [
                'id'    => 31,
                'title' => 'ctergorize_priority_delete',
            ],
            [
                'id'    => 32,
                'title' => 'ctergorize_priority_access',
            ],
            [
                'id'    => 33,
                'title' => 'responsibility_create',
            ],
            [
                'id'    => 34,
                'title' => 'responsibility_edit',
            ],
            [
                'id'    => 35,
                'title' => 'responsibility_show',
            ],
            [
                'id'    => 36,
                'title' => 'responsibility_delete',
            ],
            [
                'id'    => 37,
                'title' => 'responsibility_access',
            ],
            [
                'id'    => 38,
                'title' => 'status_type_create',
            ],
            [
                'id'    => 39,
                'title' => 'status_type_edit',
            ],
            [
                'id'    => 40,
                'title' => 'status_type_show',
            ],
            [
                'id'    => 41,
                'title' => 'status_type_delete',
            ],
            [
                'id'    => 42,
                'title' => 'status_type_access',
            ],
            [
                'id'    => 43,
                'title' => 'dynamics_nav_menu_create',
            ],
            [
                'id'    => 44,
                'title' => 'dynamics_nav_menu_edit',
            ],
            [
                'id'    => 45,
                'title' => 'dynamics_nav_menu_show',
            ],
            [
                'id'    => 46,
                'title' => 'dynamics_nav_menu_delete',
            ],
            [
                'id'    => 47,
                'title' => 'dynamics_nav_menu_access',
            ],
            [
                'id'    => 48,
                'title' => 'dynamics_nav_object_type_create',
            ],
            [
                'id'    => 49,
                'title' => 'dynamics_nav_object_type_edit',
            ],
            [
                'id'    => 50,
                'title' => 'dynamics_nav_object_type_show',
            ],
            [
                'id'    => 51,
                'title' => 'dynamics_nav_object_type_delete',
            ],
            [
                'id'    => 52,
                'title' => 'dynamics_nav_object_type_access',
            ],
            [
                'id'    => 53,
                'title' => 'dynamics_nav_ojbect_id_create',
            ],
            [
                'id'    => 54,
                'title' => 'dynamics_nav_ojbect_id_edit',
            ],
            [
                'id'    => 55,
                'title' => 'dynamics_nav_ojbect_id_show',
            ],
            [
                'id'    => 56,
                'title' => 'dynamics_nav_ojbect_id_delete',
            ],
            [
                'id'    => 57,
                'title' => 'dynamics_nav_ojbect_id_access',
            ],
            [
                'id'    => 58,
                'title' => 'project_issue_access',
            ],
            [
                'id'    => 59,
                'title' => 'issue_create',
            ],
            [
                'id'    => 60,
                'title' => 'issue_edit',
            ],
            [
                'id'    => 61,
                'title' => 'issue_show',
            ],
            [
                'id'    => 62,
                'title' => 'issue_delete',
            ],
            [
                'id'    => 63,
                'title' => 'issue_access',
            ],
            [
                'id'    => 64,
                'title' => 'requester_create',
            ],
            [
                'id'    => 65,
                'title' => 'requester_edit',
            ],
            [
                'id'    => 66,
                'title' => 'requester_show',
            ],
            [
                'id'    => 67,
                'title' => 'requester_delete',
            ],
            [
                'id'    => 68,
                'title' => 'requester_access',
            ],
            [
                'id'    => 69,
                'title' => 'department_create',
            ],
            [
                'id'    => 70,
                'title' => 'department_edit',
            ],
            [
                'id'    => 71,
                'title' => 'department_show',
            ],
            [
                'id'    => 72,
                'title' => 'department_delete',
            ],
            [
                'id'    => 73,
                'title' => 'department_access',
            ],
            [
                'id'    => 74,
                'title' => 'detail_of_subject_create',
            ],
            [
                'id'    => 75,
                'title' => 'detail_of_subject_edit',
            ],
            [
                'id'    => 76,
                'title' => 'detail_of_subject_show',
            ],
            [
                'id'    => 77,
                'title' => 'detail_of_subject_delete',
            ],
            [
                'id'    => 78,
                'title' => 'detail_of_subject_access',
            ],
            [
                'id'    => 79,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}

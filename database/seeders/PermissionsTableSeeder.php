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
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'setting_access',
            ],
            [
                'id'    => 19,
                'title' => 'branch_create',
            ],
            [
                'id'    => 20,
                'title' => 'branch_edit',
            ],
            [
                'id'    => 21,
                'title' => 'branch_show',
            ],
            [
                'id'    => 22,
                'title' => 'branch_delete',
            ],
            [
                'id'    => 23,
                'title' => 'branch_access',
            ],
            [
                'id'    => 24,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 25,
                'title' => 'user_alert_edit',
            ],
            [
                'id'    => 26,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 27,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 28,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 29,
                'title' => 'donor_create',
            ],
            [
                'id'    => 30,
                'title' => 'donor_edit',
            ],
            [
                'id'    => 31,
                'title' => 'donor_show',
            ],
            [
                'id'    => 32,
                'title' => 'donor_delete',
            ],
            [
                'id'    => 33,
                'title' => 'donor_access',
            ],
            [
                'id'    => 34,
                'title' => 'fiscal_year_create',
            ],
            [
                'id'    => 35,
                'title' => 'fiscal_year_edit',
            ],
            [
                'id'    => 36,
                'title' => 'fiscal_year_show',
            ],
            [
                'id'    => 37,
                'title' => 'fiscal_year_delete',
            ],
            [
                'id'    => 38,
                'title' => 'fiscal_year_access',
            ],
            [
                'id'    => 39,
                'title' => 'budget_name_create',
            ],
            [
                'id'    => 40,
                'title' => 'budget_name_edit',
            ],
            [
                'id'    => 41,
                'title' => 'budget_name_show',
            ],
            [
                'id'    => 42,
                'title' => 'budget_name_delete',
            ],
            [
                'id'    => 43,
                'title' => 'budget_name_access',
            ],
            [
                'id'    => 44,
                'title' => 'budge_list_access',
            ],
            [
                'id'    => 45,
                'title' => 'budget_create',
            ],
            [
                'id'    => 46,
                'title' => 'budget_edit',
            ],
            [
                'id'    => 47,
                'title' => 'budget_show',
            ],
            [
                'id'    => 48,
                'title' => 'budget_delete',
            ],
            [
                'id'    => 49,
                'title' => 'budget_access',
            ],
            [
                'id'    => 50,
                'title' => 'financial_window_access',
            ],
            [
                'id'    => 51,
                'title' => 'bank_create',
            ],
            [
                'id'    => 52,
                'title' => 'bank_edit',
            ],
            [
                'id'    => 53,
                'title' => 'bank_show',
            ],
            [
                'id'    => 54,
                'title' => 'bank_delete',
            ],
            [
                'id'    => 55,
                'title' => 'bank_access',
            ],
            [
                'id'    => 56,
                'title' => 'bank_amount_create',
            ],
            [
                'id'    => 57,
                'title' => 'bank_amount_edit',
            ],
            [
                'id'    => 58,
                'title' => 'bank_amount_show',
            ],
            [
                'id'    => 59,
                'title' => 'bank_amount_delete',
            ],
            [
                'id'    => 60,
                'title' => 'bank_amount_access',
            ],
            [
                'id'    => 61,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 62,
                'title' => 'expense_create',
            ],
            [
                'id'    => 63,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 64,
                'title' => 'expense_show',
            ],
            [
                'id'    => 65,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 66,
                'title' => 'expense_access',
            ],
            [
                'id'    => 67,
                'title' => 'country_management_access',
            ],
            [
                'id'    => 68,
                'title' => 'country_create',
            ],
            [
                'id'    => 69,
                'title' => 'country_edit',
            ],
            [
                'id'    => 70,
                'title' => 'country_show',
            ],
            [
                'id'    => 71,
                'title' => 'country_delete',
            ],
            [
                'id'    => 72,
                'title' => 'country_access',
            ],
            [
                'id'    => 73,
                'title' => 'ctiy_create',
            ],
            [
                'id'    => 74,
                'title' => 'ctiy_edit',
            ],
            [
                'id'    => 75,
                'title' => 'ctiy_show',
            ],
            [
                'id'    => 76,
                'title' => 'ctiy_delete',
            ],
            [
                'id'    => 77,
                'title' => 'ctiy_access',
            ],
            [
                'id'    => 78,
                'title' => 'area_create',
            ],
            [
                'id'    => 79,
                'title' => 'area_edit',
            ],
            [
                'id'    => 80,
                'title' => 'area_show',
            ],
            [
                'id'    => 81,
                'title' => 'area_delete',
            ],
            [
                'id'    => 82,
                'title' => 'area_access',
            ],
            [
                'id'    => 83,
                'title' => 'project_management_access',
            ],
            [
                'id'    => 84,
                'title' => 'project_department_create',
            ],
            [
                'id'    => 85,
                'title' => 'project_department_edit',
            ],
            [
                'id'    => 86,
                'title' => 'project_department_show',
            ],
            [
                'id'    => 87,
                'title' => 'project_department_delete',
            ],
            [
                'id'    => 88,
                'title' => 'project_department_access',
            ],
            [
                'id'    => 89,
                'title' => 'project_branch_create',
            ],
            [
                'id'    => 90,
                'title' => 'project_branch_edit',
            ],
            [
                'id'    => 91,
                'title' => 'project_branch_show',
            ],
            [
                'id'    => 92,
                'title' => 'project_branch_delete',
            ],
            [
                'id'    => 93,
                'title' => 'project_branch_access',
            ],
            [
                'id'    => 94,
                'title' => 'project_create',
            ],
            [
                'id'    => 95,
                'title' => 'project_edit',
            ],
            [
                'id'    => 96,
                'title' => 'project_show',
            ],
            [
                'id'    => 97,
                'title' => 'project_delete',
            ],
            [
                'id'    => 98,
                'title' => 'project_access',
            ],
            [
                'id'    => 99,
                'title' => 'project_stage_create',
            ],
            [
                'id'    => 100,
                'title' => 'project_stage_edit',
            ],
            [
                'id'    => 101,
                'title' => 'project_stage_show',
            ],
            [
                'id'    => 102,
                'title' => 'project_stage_delete',
            ],
            [
                'id'    => 103,
                'title' => 'project_stage_access',
            ],
            [
                'id'    => 104,
                'title' => 'stage_detail_create',
            ],
            [
                'id'    => 105,
                'title' => 'stage_detail_edit',
            ],
            [
                'id'    => 106,
                'title' => 'stage_detail_show',
            ],
            [
                'id'    => 107,
                'title' => 'stage_detail_delete',
            ],
            [
                'id'    => 108,
                'title' => 'stage_detail_access',
            ],
            [
                'id'    => 109,
                'title' => 'ratification_create',
            ],
            [
                'id'    => 110,
                'title' => 'ratification_edit',
            ],
            [
                'id'    => 111,
                'title' => 'ratification_show',
            ],
            [
                'id'    => 112,
                'title' => 'ratification_delete',
            ],
            [
                'id'    => 113,
                'title' => 'ratification_access',
            ],
            [
                'id'    => 114,
                'title' => 'treasury_create',
            ],
            [
                'id'    => 115,
                'title' => 'treasury_edit',
            ],
            [
                'id'    => 116,
                'title' => 'treasury_show',
            ],
            [
                'id'    => 117,
                'title' => 'treasury_delete',
            ],
            [
                'id'    => 118,
                'title' => 'treasury_access',
            ],
            [
                'id'    => 119,
                'title' => 'shek_create',
            ],
            [
                'id'    => 120,
                'title' => 'shek_edit',
            ],
            [
                'id'    => 121,
                'title' => 'shek_show',
            ],
            [
                'id'    => 122,
                'title' => 'shek_delete',
            ],
            [
                'id'    => 123,
                'title' => 'shek_access',
            ],
        ];

        Permission::insert($permissions);
    }
}

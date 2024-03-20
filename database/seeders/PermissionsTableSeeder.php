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
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'client_create',
            ],
            [
                'id'    => 24,
                'title' => 'client_edit',
            ],
            [
                'id'    => 25,
                'title' => 'client_show',
            ],
            [
                'id'    => 26,
                'title' => 'client_delete',
            ],
            [
                'id'    => 27,
                'title' => 'client_access',
            ],
            [
                'id'    => 28,
                'title' => 'technical_create',
            ],
            [
                'id'    => 29,
                'title' => 'technical_edit',
            ],
            [
                'id'    => 30,
                'title' => 'technical_show',
            ],
            [
                'id'    => 31,
                'title' => 'technical_delete',
            ],
            [
                'id'    => 32,
                'title' => 'technical_access',
            ],
            [
                'id'    => 33,
                'title' => 'client_managment_access',
            ],
            [
                'id'    => 34,
                'title' => 'general_setting_access',
            ],
            [
                'id'    => 35,
                'title' => 'slider_create',
            ],
            [
                'id'    => 36,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 37,
                'title' => 'slider_show',
            ],
            [
                'id'    => 38,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 39,
                'title' => 'slider_access',
            ],
            [
                'id'    => 40,
                'title' => 'service_create',
            ],
            [
                'id'    => 41,
                'title' => 'service_edit',
            ],
            [
                'id'    => 42,
                'title' => 'service_show',
            ],
            [
                'id'    => 43,
                'title' => 'service_delete',
            ],
            [
                'id'    => 44,
                'title' => 'service_access',
            ],
            [
                'id'    => 45,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 46,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 47,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 48,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 49,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 50,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 51,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 52,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 53,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 54,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 55,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 56,
                'title' => 'contactu_create',
            ],
            [
                'id'    => 57,
                'title' => 'contactu_edit',
            ],
            [
                'id'    => 58,
                'title' => 'contactu_show',
            ],
            [
                'id'    => 59,
                'title' => 'contactu_delete',
            ],
            [
                'id'    => 60,
                'title' => 'contactu_access',
            ],
            [
                'id'    => 61,
                'title' => 'about_create',
            ],
            [
                'id'    => 62,
                'title' => 'about_edit',
            ],
            [
                'id'    => 63,
                'title' => 'about_show',
            ],
            [
                'id'    => 64,
                'title' => 'about_delete',
            ],
            [
                'id'    => 65,
                'title' => 'about_access',
            ],
            [
                'id'    => 66,
                'title' => 'team_work_create',
            ],
            [
                'id'    => 67,
                'title' => 'team_work_edit',
            ],
            [
                'id'    => 68,
                'title' => 'team_work_show',
            ],
            [
                'id'    => 69,
                'title' => 'team_work_delete',
            ],
            [
                'id'    => 70,
                'title' => 'team_work_access',
            ],
            [
                'id'    => 71,
                'title' => 'request_service_create',
            ],
            [
                'id'    => 72,
                'title' => 'request_service_edit',
            ],
            [
                'id'    => 73,
                'title' => 'request_service_show',
            ],
            [
                'id'    => 74,
                'title' => 'request_service_delete',
            ],
            [
                'id'    => 75,
                'title' => 'request_service_access',
            ],
            [
                'id'    => 76,
                'title' => 'contract_create',
            ],
            [
                'id'    => 77,
                'title' => 'contract_edit',
            ],
            [
                'id'    => 78,
                'title' => 'contract_show',
            ],
            [
                'id'    => 79,
                'title' => 'contract_delete',
            ],
            [
                'id'    => 80,
                'title' => 'contract_access',
            ],
            [
                'id'    => 81,
                'title' => 'appointment_create',
            ],
            [
                'id'    => 82,
                'title' => 'appointment_edit',
            ],
            [
                'id'    => 83,
                'title' => 'appointment_show',
            ],
            [
                'id'    => 84,
                'title' => 'appointment_delete',
            ],
            [
                'id'    => 85,
                'title' => 'appointment_access',
            ],
            [
                'id'    => 86,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}

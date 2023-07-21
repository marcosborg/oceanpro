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
                'title' => 'page_create',
            ],
            [
                'id'    => 18,
                'title' => 'page_edit',
            ],
            [
                'id'    => 19,
                'title' => 'page_show',
            ],
            [
                'id'    => 20,
                'title' => 'page_delete',
            ],
            [
                'id'    => 21,
                'title' => 'page_access',
            ],
            [
                'id'    => 22,
                'title' => 'service_create',
            ],
            [
                'id'    => 23,
                'title' => 'service_edit',
            ],
            [
                'id'    => 24,
                'title' => 'service_show',
            ],
            [
                'id'    => 25,
                'title' => 'service_delete',
            ],
            [
                'id'    => 26,
                'title' => 'service_access',
            ],
            [
                'id'    => 27,
                'title' => 'quotation_create',
            ],
            [
                'id'    => 28,
                'title' => 'quotation_edit',
            ],
            [
                'id'    => 29,
                'title' => 'quotation_show',
            ],
            [
                'id'    => 30,
                'title' => 'quotation_delete',
            ],
            [
                'id'    => 31,
                'title' => 'quotation_access',
            ],
            [
                'id'    => 32,
                'title' => 'contact_create',
            ],
            [
                'id'    => 33,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 34,
                'title' => 'contact_show',
            ],
            [
                'id'    => 35,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 36,
                'title' => 'contact_access',
            ],
            [
                'id'    => 37,
                'title' => 'home_access',
            ],
            [
                'id'    => 38,
                'title' => 'slide_create',
            ],
            [
                'id'    => 39,
                'title' => 'slide_edit',
            ],
            [
                'id'    => 40,
                'title' => 'slide_show',
            ],
            [
                'id'    => 41,
                'title' => 'slide_delete',
            ],
            [
                'id'    => 42,
                'title' => 'slide_access',
            ],
            [
                'id'    => 43,
                'title' => 'service_list_create',
            ],
            [
                'id'    => 44,
                'title' => 'service_list_edit',
            ],
            [
                'id'    => 45,
                'title' => 'service_list_show',
            ],
            [
                'id'    => 46,
                'title' => 'service_list_delete',
            ],
            [
                'id'    => 47,
                'title' => 'service_list_access',
            ],
            [
                'id'    => 48,
                'title' => 'feature_create',
            ],
            [
                'id'    => 49,
                'title' => 'feature_edit',
            ],
            [
                'id'    => 50,
                'title' => 'feature_show',
            ],
            [
                'id'    => 51,
                'title' => 'feature_delete',
            ],
            [
                'id'    => 52,
                'title' => 'feature_access',
            ],
            [
                'id'    => 53,
                'title' => 'inner_service_create',
            ],
            [
                'id'    => 54,
                'title' => 'inner_service_edit',
            ],
            [
                'id'    => 55,
                'title' => 'inner_service_show',
            ],
            [
                'id'    => 56,
                'title' => 'inner_service_delete',
            ],
            [
                'id'    => 57,
                'title' => 'inner_service_access',
            ],
            [
                'id'    => 58,
                'title' => 'video_create',
            ],
            [
                'id'    => 59,
                'title' => 'video_edit',
            ],
            [
                'id'    => 60,
                'title' => 'video_show',
            ],
            [
                'id'    => 61,
                'title' => 'video_delete',
            ],
            [
                'id'    => 62,
                'title' => 'video_access',
            ],
            [
                'id'    => 63,
                'title' => 'customer_create',
            ],
            [
                'id'    => 64,
                'title' => 'customer_edit',
            ],
            [
                'id'    => 65,
                'title' => 'customer_show',
            ],
            [
                'id'    => 66,
                'title' => 'customer_delete',
            ],
            [
                'id'    => 67,
                'title' => 'customer_access',
            ],
            [
                'id'    => 68,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}

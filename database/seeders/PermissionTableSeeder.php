<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            //For roll and permission
            'role-and-permission-list',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            //For Resource
            'resource-list',

            //For User
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            //For Team
            'team-list',
            'team-create',
            'team-edit',
            'team-delete',

            //For Category
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',

            //Site Setting
            'site-setting',

            //Dashboard
            'cart-list',
            'login-log-list',


        ];
        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }
    }
}

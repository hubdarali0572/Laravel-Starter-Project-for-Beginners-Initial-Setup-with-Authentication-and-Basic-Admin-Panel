<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->seedPermissions();
        $this->seedRoles();
    }

    private function seedPermissions()
    {
        $permissions = [

            // for user
            'view user',
            'create user',
            'edit user',
            'show user',
            'delete user',

            // for Student enrollment

            'view enrollment',
            'create enrollment',
            'edit enrollment',
            'show enrollment',
            'delete enrollment',
            // for Student Contact

            'view contact',
            'create contact',
            'edit contact',
            'show contact',
            'delete contact',
            // for Role

            'view role',
            'create role',
            'edit role',
            'show role',
            'delete role',


        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }

    private function seedRoles()
    {

        // Create roles
        $superAdminRole = Role::firstOrCreate(['name' => 'SuperAdmin']);
        // Assign permissions to roles
        $superAdminRole->givePermissionTo(Permission::all());
    }
}

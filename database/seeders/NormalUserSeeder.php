<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NormalUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find super admin role
        $UserRole = Role::firstOrCreate(['name' => 'User']);

        // Create super admin user and assign role
        $User = User::firstOrCreate([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'user_type' => 'User',
             'role_id' => $UserRole->id,
            'password' => Hash::make('user@321'),
        ]);
        $User->assignRole($UserRole);
    }
}

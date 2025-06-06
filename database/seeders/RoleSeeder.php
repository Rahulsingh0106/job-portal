<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Admin', "guard_name" => 'admin']);
        Role::create(['name' => 'Employer', "guard_name" => 'employer']);
        Role::create(['name' => 'User', "guard_name" => 'web']);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate([
            'name' => 'User',
            'guard_name' => 'web'
        ]);

        $admin1 = User::create([
            'name' => 'John',
            'email' => 'john@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
        ]);
        $admin1->assignRole($adminRole);

        $admin2 = User::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
        ]);
        $admin2->assignRole($adminRole);
    }
}

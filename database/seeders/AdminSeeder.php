<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Make sure this is correct
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::firstOrCreate([
            'name' => 'Admin',
            'guard_name' => 'admin'
        ]);

        $admin1 = User::create([
            'name' => 'John Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
        ]);
        $admin1->assignRole($adminRole);

        $admin2 = User::create([
            'name' => 'Jane Smith Admin',
            'email' => 'jane.smith.admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
        ]);
        $admin2->assignRole($adminRole);
    }
}

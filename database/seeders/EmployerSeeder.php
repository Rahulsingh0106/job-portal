<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate([
            'name' => 'Employer',
            'guard_name' => 'employer'
        ]);

        $admin1 = Employer::create([
            'name' => 'John employer',
            'email' => 'john.employer@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
        ]);
        $admin1->assignRole($adminRole);

        $admin2 = Employer::create([
            'name' => 'Jane Smith Employer',
            'email' => 'jane.smith.employer@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
        ]);
        $admin2->assignRole($adminRole);
    }
}

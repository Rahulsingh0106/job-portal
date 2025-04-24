<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('job_posts')->insert([
            [
                'employer_id' => 1,
                'title' => 'Software Engineer',
                'description' => 'Develop and maintain web applications.',
                'status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employer_id' => 2,
                'title' => 'Data Analyst',
                'description' => 'Analyze and interpret complex data sets.',
                'status' => 'Accepted',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employer_id' => 1,
                'title' => 'Project Manager',
                'description' => 'Manage project timelines and deliverables.',
                'status' => 'Accepted',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

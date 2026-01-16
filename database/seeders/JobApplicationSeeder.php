<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\jobApplication;
use Carbon\Carbon;

class JobApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // John applies to jobs posted by Jane and Mike
        jobApplication::create([
            'create_job_id' => 3, // Digital Marketing Specialist
            'user_id' => 2, // John
            'employer_id' => 3, // Jane
            'applied_date' => Carbon::now()->subDays(5),
        ]);

        jobApplication::create([
            'create_job_id' => 5, // HR Manager
            'user_id' => 2, // John
            'employer_id' => 4, // Mike
            'applied_date' => Carbon::now()->subDays(3),
        ]);

        // Jane applies to jobs posted by John and Mike
        jobApplication::create([
            'create_job_id' => 1, // Senior PHP Developer
            'user_id' => 3, // Jane
            'employer_id' => 2, // John
            'applied_date' => Carbon::now()->subDays(7),
        ]);

        jobApplication::create([
            'create_job_id' => 2, // Frontend Developer
            'user_id' => 3, // Jane
            'employer_id' => 2, // John
            'applied_date' => Carbon::now()->subDays(4),
        ]);

        jobApplication::create([
            'create_job_id' => 6, // Graphic Designer
            'user_id' => 3, // Jane
            'employer_id' => 4, // Mike
            'applied_date' => Carbon::now()->subDays(2),
        ]);

        // Mike applies to jobs posted by John and Jane
        jobApplication::create([
            'create_job_id' => 1, // Senior PHP Developer
            'user_id' => 4, // Mike
            'employer_id' => 2, // John
            'applied_date' => Carbon::now()->subDays(6),
        ]);

        jobApplication::create([
            'create_job_id' => 4, // Content Writer
            'user_id' => 4, // Mike
            'employer_id' => 3, // Jane
            'applied_date' => Carbon::now()->subDays(1),
        ]);
    }
}

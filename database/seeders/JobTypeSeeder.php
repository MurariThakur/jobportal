<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('job_types')->insert([
            ['name' => 'Full Time', 'status' => 1],
            ['name' => 'Part TIme', 'status' => 1],
            ['name' => 'Remote', 'status' => 1],
            ['name' => 'Freelance', 'status' => 1],
            ['name' => 'Hours', 'status' => 1],
        ]);
    }
}

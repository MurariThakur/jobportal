<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('categories')->insert([
            ['name' => 'Technology', 'status' => 1],
            ['name' => 'Healthcare', 'status' => 1],
            ['name' => 'Finance', 'status' => 1],
            ['name' => 'Education', 'status' => 1],
            ['name' => 'software', 'status' => 1],
        ]);
    }
}

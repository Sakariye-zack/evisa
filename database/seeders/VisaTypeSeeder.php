<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisaTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('visa_types')->insert([
            ['code' => 'T', 'name' => 'Tourist Visa', 'fee' => 60.00],
            ['code' => 'B', 'name' => 'Business Visa', 'fee' => 100.00],
            ['code' => 'S', 'name' => 'Student Visa', 'fee' => 40.00],
        ]);
    }
}

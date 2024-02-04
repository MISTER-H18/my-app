<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('marital_statuses')->insertOrIgnore(['status' => 'Single', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('marital_statuses')->insertOrIgnore(['status' => 'Married', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('marital_statuses')->insertOrIgnore(['status' => 'Divorced', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('marital_statuses')->insertOrIgnore(['status' => 'Widowed', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            
        $this->truncateTables([
            'marital_statuses',
            'user_roles',
            'users',
            'teams',
        ]);

        $this->call([
            MaritalStatusSeeder::class,
            UserRolesSeeder::class,
            UserSeeder::class,
            TeamSeeder::class,
        ]);
        
    }

    public function truncateTables(array $tables){
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
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
            'permissions',
            'user_roles',
            'privileges',

            'marital_statuses',
            'users',
            // 'teams',
            // 'team_user',
            'events',
        ]);

        $this->call([
            PermissionSeeder::class,
            UserRolesSeeder::class,
            PrivilegesSeeder::class,
            
            MaritalStatusSeeder::class,
            UserSeeder::class,
            // TeamSeeder::class,
            // MembershipSeeder::class,
            EventSeeder::class,
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
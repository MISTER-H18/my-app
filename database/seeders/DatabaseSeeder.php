<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // \App\Models\User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);
            
        $this->truncateTables([
            'marital_statuses',
            // 'occupations',
            //'phone_numbers',
        ]);

        $this->call([
            MaritalStatusSeeder::class,
            // OccupationSeeder::class,
            //PhoneNumberSeeder::class,
        ]);
        
        \App\Models\User::factory(50)->create();
        

    }

    public function truncateTables(array $tables){
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}

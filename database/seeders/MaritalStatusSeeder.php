<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

use App\Models\MaritalStatus;

class MaritalStatusSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marital_statuses = ['Soltero', 'Casado', 'Divorciado', 'Viudo', 'Concubinato'];

        foreach ($marital_statuses as $new_marital_status) {
            
            $marital_status = new MaritalStatus;

            $marital_status->status_name = $new_marital_status;
            $marital_status->created_at = Carbon::now();
            $marital_status->updated_at = Carbon::now();
        
            $marital_status->save();

        }

    }
}
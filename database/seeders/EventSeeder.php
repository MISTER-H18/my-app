<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'event' => 'Cita #1',
                'start_date' => '2021-08-30 14:00',
                'end_date' => '2021-08-30 15:00',
            ],
            [
                'event' => 'Cita #2',
                'start_date' => '2021-09-15  16:30',
                'end_date' => '2022-12-19 11:00',
            ],
            [
                'event' => 'Cita #3',
                'start_date' => '2021-10-17 10:00',
                'end_date' => '2022-12-20  11:30',
            ],
            [
                'event' => 'Cita #4',
                'start_date' => '2021-10-17 10:00',
                'end_date' => '2022-12-20  11:30',
            ],
        ];
    }
}

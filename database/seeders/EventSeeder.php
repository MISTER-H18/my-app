<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $events = ['Cita #1', 'Cita #2', 'Cita #3', 'Cita #4', 'Cita #5'];

        // foreach ($events as $new_event) {

        //     $event = new Event;

        //     $event->event = $new_event;
        //     $event->start_date = Carbon::now()->addDays(rand(0, 180))->format('Y-m-d');
        //     $event->end_date = Carbon::now()->addDays(rand(0, 179))->format('Y-m-d');

        //     $event->created_at = Carbon::now();
        //     $event->updated_at = Carbon::now();

        //     $event->save();

        // }

    }
}

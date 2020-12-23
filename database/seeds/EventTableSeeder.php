<?php

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = new Event;
        $event->event_date = "2020-12-11";
        $event->event_time = '1830';
        $event->user_id = 2;
        $event->course_id = 1;
        $event->title = "Prueba diagnostica";
        $event->description = "Migrations are like version control for your database";
        $event->priority = "High";
        $event->tags = "evaluation";
        $event->topics = "Scratch, Excel, Word, Gimp, Hardware, Software";
        $event->save();
    }
}

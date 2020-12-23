<?php

use App\Models\ScheduleArea;
use Illuminate\Database\Seeder;

class ScheduleAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scheduleArea = new ScheduleArea();
        $scheduleArea->user_id = 2;
        $scheduleArea->class_id = 1;
        $scheduleArea->description = "5 min Do now, 5 min Intro al Tema, 10min Practica Guiada, 20 min Practica Independiente, 5 min Ticket de salida";
        $scheduleArea->save();
    }
}

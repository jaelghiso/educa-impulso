<?php

use App\Models\DoNowArea;
use Illuminate\Database\Seeder;

class DoNowAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doNowArea = new DoNowArea();
        $doNowArea->user_id = 2;
        $doNowArea->class_id = 1;
        $doNowArea->description = "¿Sabes como realizar una búsqueda en la Web?";
        $doNowArea->urlDoNow = "https://www.typeform.com/templates/t/demographic-survey-questionnaire/";
        $doNowArea->save();
    }
}

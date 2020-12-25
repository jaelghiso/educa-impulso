<?php

use App\Models\IndividualPracticeArea;
use Illuminate\Database\Seeder;

class IndividualPracticeAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $individualPracticeArea = new IndividualPracticeArea;
        $individualPracticeArea->user_id = 3;
        $individualPracticeArea->class_id = 1;
        $individualPracticeArea->title = "¡A practicar!";
        $individualPracticeArea->individualPracticeText = "En la práctica guiada vamos a ingresar a los dos paginas Web, Antel  y Ose. Luego de ingresar responde las siguientes preguntas.";
        $individualPracticeArea->image = "";
        $individualPracticeArea->highlightList = "";
        $individualPracticeArea->save();
    }
}

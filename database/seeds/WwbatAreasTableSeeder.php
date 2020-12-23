<?php

use App\Models\WwbatArea;
use Illuminate\Database\Seeder;

class WwbatAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wwbatArea = new WwbatArea;
        $wwbatArea->user_id = 2;
        $wwbatArea->class_id = 1;
        $wwbatArea->description = "Búsqueda responsable en la Web";
        $wwbatArea->save();
    }
}

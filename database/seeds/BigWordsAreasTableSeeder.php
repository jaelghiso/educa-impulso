<?php

use App\Models\BigWordsArea;
use Illuminate\Database\Seeder;

class BigWordsAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bigWordsArea = new BigWordsArea();
        $bigWordsArea->user_id = 2;
        $bigWordsArea->class_id = 1;
        $bigWordsArea->description = "búsqueda, web, fiabilidad";
        $bigWordsArea->save();
    }
}

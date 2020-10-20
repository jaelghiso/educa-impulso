<?php

use App\Models\Summary;
use Illuminate\Database\Seeder;

class SummaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $summary = new Summary;
        $summary->user_id = 2;
        $summary->course_id = 1;
        $summary->title = "Crea tu propio fotomontaje";
        $summary->description = "1-Escoje una imagen 2- Aplicas las herramientas correspondientes 3-Agrega personajes 4-Utiliza técnicas";
        $summary->save();
    }
}

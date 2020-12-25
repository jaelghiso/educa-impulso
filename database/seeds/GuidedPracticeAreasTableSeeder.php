<?php

use App\Models\GuidedPracticeArea;
use Illuminate\Database\Seeder;

class GuidedPracticeAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guidedPracticeArea = new GuidedPracticeArea;
        $guidedPracticeArea->user_id = 3;
        $guidedPracticeArea->class_id = 1;
        $guidedPracticeArea->title = "5 consejos rápidos para evaluar la fiabilidad de la información web";
        $guidedPracticeArea->guidedPracticeText = "1.No te quedes con el primer resultado. Busca, compara y revisa… y usa la búsqueda avanzada.

        2.Mira quién escribe la información. Trata de ver las credenciales del autor y su reputación.

        3.Ten en cuenta el medio en el cual se publica dicho contenido por si pudiese haber algún tipo de sesgo en la información o publicidad.

        4.Mira si el contenido es actual, original, correcto (bien escrito), tiene un razonamiento lógico y si cita sus fuentes de información.

        5.Pregunta a una persona de tu confianza que tenga experiencia en la búsqueda y pídele su opinión.";
        $guidedPracticeArea->image = "";
        $guidedPracticeArea->urlVideoGuided = "https://youtu.be/ohlaZyUVToU";
        $guidedPracticeArea->save();
    }
}

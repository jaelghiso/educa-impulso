<?php

use App\Models\ExitTicketArea;
use Illuminate\Database\Seeder;

class ExitTicketAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exitTicketArea = new ExitTicketArea();
        $exitTicketArea->user_id = 2;
        $exitTicketArea->class_id = 1;
        $exitTicketArea->description = "Revisemos lo que aprendimos hoy en esta encuesta:";
        $exitTicketArea->urlExitTicket = "https://www.typeform.com/templates/t/demographic-survey-questionnaire/";
        $exitTicketArea->save();
    }
}

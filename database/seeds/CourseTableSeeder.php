<?php

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = new Course;

        $course->user_id = 2;
        $course->title = "Gimp";
        $course->description = "l curso de Gimp está dirigido a estudiantes y profesionales de diseño gráfico, artes visuales, fotografía digital u otras carreras a fines que deseen optar por una formación profesional, la cual ayude adoptar un dominio global e integrado del proceso de creación y edición de imágenes utilizando este software libre.";
        $course->save();
    }
}

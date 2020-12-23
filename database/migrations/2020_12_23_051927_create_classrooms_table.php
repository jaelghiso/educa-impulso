<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('wwbat_areas_id');
            $table->unsignedBigInteger('big_words_areas_id');
            $table->unsignedBigInteger('schedule_areas_id');
            $table->unsignedBigInteger('do_now_areas_id');
            $table->unsignedBigInteger('guided_practice_areas_id');
            $table->unsignedBigInteger('individual_practice_areas_id');
            $table->unsignedBigInteger('exit_ticket_areas_id');

            $table->foreign('wwbat_areas_id')->references('id')->on('wwbat_areas');
            $table->foreign('big_words_areas_id')->references('id')->on('big_words_areas');
            $table->foreign('schedule_areas_id')->references('id')->on('schedule_areas');
            $table->foreign('do_now_areas_id')->references('id')->on('do_now_areas');
            $table->foreign('guided_practice_areas_id')->references('id')->on('guided_practice_areas');
            $table->foreign('individual_practice_areas_id')->references('id')->on('individual_practice_areas');
            $table->foreign('exit_ticket_areas_id')->references('id')->on('exit_ticket_areas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classrooms');
    }
}

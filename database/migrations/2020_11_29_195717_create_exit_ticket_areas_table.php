<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExitTicketAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exit_ticket_areas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->unsignedBigInteger('class_id');
            $table->text('description');
            $table->text('urlExitTicket');
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
        Schema::dropIfExists('exit_ticket_areas');
    }
}

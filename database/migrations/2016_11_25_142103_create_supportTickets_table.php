<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supportTicket', function (Blueprint $table) {
            $table->increments('id');       //Ticket Number
            $table->integer('username_id'); //User who issued the ticket
            $table->string('message');
            $table->boolean('handled');
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supportTicket');
    }
}

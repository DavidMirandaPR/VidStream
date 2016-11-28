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
        Schema::create('supportTickets', function (Blueprint $table) {
            $table->increments('id');       //Ticket Number
            $table->integer('username_id'); //User who issued the ticket
            $table->integer('staff_id')->nullable();
            $table->string('message');
            $table->boolean('handled')->default(false);
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
        Schema::dropIfExists('supportTickets');
    }
}

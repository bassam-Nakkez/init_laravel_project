<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passengers', function (Blueprint $table) {
            $table->id('passengerId');
            $table->string('firstName',25);
            $table->string('lastName',25);
            $table->enum('gender',['ذكر','انثى']);
            $table->string('phoneNumber',20)->nullable();
            $table->string('personalId',20)->max(11);
            $table->foreignId("travelId")->references("travelId")->on("travels")->cascadeOnDelete();
            $table->string("station");
            $table->date('birthDay');
            $table->string("seatsNumbers",70);
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
        Schema::dropIfExists('passengers');
    }
}

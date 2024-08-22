<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_follows', function (Blueprint $table) {
            $table->id('travelFollowId');
            $table->foreignId("userId")->references("userId")->on("users")->cascadeOnDelete();
            $table->foreignId("travelId")->references("travelId")->on("travels")->cascadeOnDelete();
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
        Schema::dropIfExists('travel_follows');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTravailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_travails', function (Blueprint $table) {
            $table->id("employeeTravelId");
            $table->foreignId("employeeId")->references("employeeId")->on('employees')->onDelete("cascade");
            $table->foreignId("travelId")->references("travelId")->on('travels')->onDelete("cascade");
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
        Schema::dropIfExists('employee_travails');
    }
}

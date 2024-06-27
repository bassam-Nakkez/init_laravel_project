<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employeeId');
            $table->string('firstName');
            $table->string('lastName');
            $table->enum('gendor',['انثى','ذكر']);
            $table->foreignId('authId')->references('authId')->on('entity_auth_information')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('birthDay')->nullable();
            $table->text('Image')->nullable();
            $table->integer('type')->max(1)->default(1);
            $table->foreignId('companyId')->references('companyId')->on('companies')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('employees');
    }
}

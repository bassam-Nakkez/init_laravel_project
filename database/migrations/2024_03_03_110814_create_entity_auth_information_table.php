<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntityAuthInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_auth_information', function (Blueprint $table) {
            $table->bigIncrements('authId');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email',60)->unique();
            $table->string('password');
            $table->integer('type')->max(1);
            $table->rememberToken();
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
        Schema::dropIfExists('entity_auth_information');
    }
}

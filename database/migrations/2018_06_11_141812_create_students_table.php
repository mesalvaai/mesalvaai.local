<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('cpf',14);
            $table->string('email', 255);
            $table->date('data_of_birth');
            $table->string('phone', 14);
            $table->string('cep', 10);
            $table->string('state', 255);
            $table->string('city', 255);
            $table->string('street', 255);
            $table->string('number', 45);
            $table->string('neighborhood', 255);
            $table->string('complement', 45);
            $table->string('status', 45);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->foreign('user_id')->references('users')->on('id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}

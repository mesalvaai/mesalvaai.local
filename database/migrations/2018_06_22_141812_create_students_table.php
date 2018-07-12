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
            $table->integer('user_id')->unsigned();
            $table->integer('state_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->string('name', 255);
            $table->string('cpf',14);
            $table->string('email', 255);
            $table->date('data_of_birth');
            $table->string('phone', 14);
            $table->string('institution', 255);
            $table->string('cep', 10);
            $table->string('street', 255);
            $table->string('number', 10);
            $table->string('neighborhood', 255);
            $table->string('complement', 45);
            $table->string('how_met_us')->nullable();
            $table->enum('status', ['0', '1'])->default('0');
            $table->timestamps();
            
            //Relations
            //onDelete e onUpdate : sim nos excluimos um usuario, se excluem todos os dados relacionados com esse usuario
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('state_id')->references('id')->on('states')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('city_id')->references('id')->on('cities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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

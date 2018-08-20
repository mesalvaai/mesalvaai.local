<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->string('slug', 150);
            $table->string('phone', 16);
            $table->string('cpnj', 18);
            $table->string('cpe', 9);
            $table->string('street', 45);
            $table->string('number', 5);
            $table->string('neighborhood', 45);
            $table->string('complement', 45);
            $table->integer('handbag', 9);
            $table->string('logo', 45);
            $table->string('evaluation', 45);
            $table->text('description')->nullable();
            $table->integer('status', 1);
            $table->foreign('state_id')->references('state_id')->on('cities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('city_id')->references('id')->on('cities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('institutions');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costs', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('monthly_payment');
            $table->integer('discount', 2);
            $table->integer('scholarship', 2);
            $table->decimal('economy');
            $table->integer('vacancy', 2);
            $table->integer('status', 1);
            $table->foreign('course_id')->references('course_id')->on('courses')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('periods_id')->references('periods_id')->on('periods')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('level_id')->references('level_id')->on('levels')
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
        Schema::dropIfExists('costs');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'donations';

    /**
     * Run the migrations.
     * @table donations
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('phone', 45)->nullable();
            $table->string('cpf', 45)->nullable();
            $table->float('total_amount')->nullable();
            $table->dateTime('donation_date')->nullable();
            $table->char('type_payment', 11)->nullable();
            $table->string('payment_id', 16)->nullable();
            $table->string('order_id', 16)->nullable();
            $table->char('payment_status', 15)->nullable();
            $table->string('card_number', 16)->nullable();
            $table->string('card_name', 100)->nullable();
            $table->char('card_expiration', 5)->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->boolean('anonymus')->nullable();
            $table->text('details')->nullable();
            $table->boolean('status')->nullable();
            $table->nullableTimestamps();

            $table->unique(["id"], 'id_UNIQUE');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}

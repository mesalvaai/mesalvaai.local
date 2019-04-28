<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'campaigns';

    /**
     * Run the migrations.
     * @table campaigns
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->integer('category_id')->unsigned();
            //$table->integer('period_id')->unsigned();
            $table->string('title')->nullable();
            $table->decimal('goal', 12, 2)->nullable()->default(null);
            $table->decimal('funds_received', 12, 2)->nullable()->default('0.00');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->nullable();
      
            $table->string('slug')->nullable()->default(null);
            $table->text('abstract')->nullable()->default(null);
            $table->string('file_path')->nullable()->default(null);
            $table->string('institution')->nullable()->default(null);
            $table->string('course')->nullable()->default(null);
            $table->string('period', 45)->nullable()->default(null);
            $table->string('location')->nullable()->default(null);
            $table->integer('terms_of_use')->nullable()->default(null);
            $table->string('facebook')->nullable()->default(null);
            $table->string('twitter')->nullable()->default(null);
            $table->string('instagram')->nullable()->default(null);
            $table->integer('published')->nullable()->default('0');

            $table->index(["category_id"], 'fk_campaigns_categories1_idx');

            $table->index(["student_id"], 'fk_campaigns_students1_idx');

            //$table->index(["period_id"], 'fk_campaigns_periods1_idx');

            $table->unique(["id"], 'id_UNIQUE');
            $table->nullableTimestamps();


            $table->foreign('category_id', 'fk_campaigns_categories1_idx')
                ->references('id')->on('categories')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('student_id', 'fk_campaigns_students1_idx')
                ->references('id')->on('students')
                ->onDelete('no action')
                ->onUpdate('no action');

            /*$table->foreign('periods_id', 'fk_campaigns_periods1_idx')
                ->references('id')->on('periods')
                ->onDelete('no action')
                ->onUpdate('no action');*/
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

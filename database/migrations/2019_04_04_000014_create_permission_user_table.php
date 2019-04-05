<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionUserTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'permission_user';

    /**
     * Run the migrations.
     * @table permission_user
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('permission_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->index(["user_id"], 'fk_permissions_has_users_users1_idx');

            $table->index(["permission_id"], 'fk_permissions_has_users_permissions1_idx');

            $table->unique(["id"], 'id_UNIQUE');
            $table->nullableTimestamps();


            $table->foreign('permission_id', 'fk_permissions_has_users_permissions1_idx')
                ->references('id')->on('permissions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('user_id', 'fk_permissions_has_users_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
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

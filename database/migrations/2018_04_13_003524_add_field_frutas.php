<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldFrutas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('frutas', function(Blueprint $table){
        //     $table->string('pais')->after('name');
        //     $table->renameColumn('description', 'descripcao');
        // });
        DB::statement('
            CREATE TABLE probandosql(
                id int(11) auto_increment not null,
                publication int(225),
                PRIMARY KEY(id)
            )
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

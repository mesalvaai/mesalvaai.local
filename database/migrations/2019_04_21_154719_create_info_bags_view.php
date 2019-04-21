<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoBagsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("create view vw_info_bags as select 
        i.name as name_institution,
        i.id as id_institution,
        i.state_id as state_id_institution,
        i.city_id as city_id_institution,
        c.name as name_course,
        m.name as name_modality,
        m.id as id_modality,
        c.duration as duration_course,
        c.id as id_course,
        cc.monthly_payment,
        cc.discount,
        l.name as name_level,
        l.id as id_level,
        tt.name as name_type,
        t.name as name_turn,
        t.id as id_turn
        from msa_v3.institutions i
        inner join institution_course ic on (i.id = ic.institution_id) 
        inner join courses c on (ic.course_id = c.id)
        inner join course_turn ct on (ct.course_id = c.id)
        inner join turns t on (ct.turn_id = t.id)
        inner join levels l on (l.id =ct.turn_id)
        inner join course_modality cm on (cm.course_id = c.id)
        inner join modalities m on (m.id = cm.modality_id)
        inner join course_type ctt on (ctt.course_id = c.id)
        inner join types tt on (tt.id = ctt.type_id)
        inner join costs cc on (cc.course_id = c.id);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW vw_info_bags");
    }
}

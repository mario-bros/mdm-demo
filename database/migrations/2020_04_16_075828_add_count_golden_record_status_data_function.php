<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCountGoldenRecordStatusDataFunction extends Migration
{
    public function up()
    {
        \DB::unprepared('
            CREATE OR REPLACE FUNCTION mdm_dev.count_golden_record_by_status( _approval_status int)
                RETURNS int
                LANGUAGE plpgsql
            AS $function$
            BEGIN
                RETURN (
                    SELECT count(prof_cl.id)::int
                    FROM mdm_dev.mdm_staging_customer_profile_clean prof_cl
                    WHERE prof_cl.flag_process = _approval_status
                );
            END;$function$
            ;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::unprepared('
            drop function mdm_dev.count_golden_record_by_status;
        ');
    }
}

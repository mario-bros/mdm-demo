<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResetSequentialPkeyToProfileClean extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mdm_staging_customer_profile_clean', function (Blueprint $table) {
            $table->dropPrimary('mdm_staging_customer_profile_clean_pkey');
        });

        Schema::table('mdm_staging_customer_profile_clean', function (Blueprint $table) {
            $table->dropColumn('id');
        });

        Schema::table('mdm_staging_customer_profile_clean', function (Blueprint $table) {
            $table->bigIncrements('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mdm_staging_customer_profile_clean', function (Blueprint $table) {
            //
        });
    }
}

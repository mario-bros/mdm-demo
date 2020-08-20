<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniqueIndexToMappingUidGolden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mdm_staging_mapping_uid_golden', function (Blueprint $table) {
            $table->unique('uid_unit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mdm_staging_mapping_uid_golden', function (Blueprint $table) {
            $table->dropUnique('uid_unit');
        });
    }
}

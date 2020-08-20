<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;

class AddNameIndexToCustomerProfileClean extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION pg_trgm with schema pg_catalog;');
        DB::statement('CREATE INDEX customer_profile_clean_full_name_gin_trgm_idx ON mdm_staging_customer_profile_clean USING gin (full_name gin_trgm_ops);');
        /*Schema::table('mdm_staging_customer_profile_clean', function (Blueprint $table) {
            $table->index('full_name');
            
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::table('mdm_staging_customer_profile_clean', function (Blueprint $table) {
            $table->dropIndex(['full_name']);
        });*/

        DB::statement('DROP EXTENSION pg_trgm;');
        DB::statement('DROP INDEX customer_profile_clean_full_name_gin_trgm_idx;');
    }
}

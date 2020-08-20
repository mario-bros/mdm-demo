<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexFullName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement('CREATE EXTENSION pg_trgm with schema pg_catalog;');
        \DB::statement('CREATE INDEX mdm_customer_profile_web_full_name_gin_trgm_idx ON mdm_customer_profile_web USING gin (full_name gin_trgm_ops);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement('DROP INDEX mdm_customer_profile_web_full_name_gin_trgm_idx;');
    }
}

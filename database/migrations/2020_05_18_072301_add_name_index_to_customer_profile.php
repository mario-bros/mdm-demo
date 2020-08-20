<?php

use Illuminate\Database\Migrations\Migration;

class AddNameIndexToCustomerProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE INDEX mdm_customer_profile_full_name_gin_trgm_idx ON mdm_customer_profile USING gin (full_name gin_trgm_ops);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP INDEX mdm_customer_profile_full_name_gin_trgm_idx;');
    }
}

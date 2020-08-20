<?php

use Illuminate\Database\Migrations\Migration;

class AddUIDGoldenIndexToCustomerProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mdm_customer_profile', function (Blueprint $table) {
            $table->index('uid_golden');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mdm_customer_profile', function (Blueprint $table) {
            $table->dropIndex(['uid_golden']);
        });
    }
}
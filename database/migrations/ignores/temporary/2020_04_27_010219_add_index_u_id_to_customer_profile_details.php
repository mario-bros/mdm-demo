<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexUIdToCustomerProfileDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mdm_customer_address', function (Blueprint $table) {
            $table->index('u_id');
        });

        Schema::table('mdm_customer_bank_account', function (Blueprint $table) {
            $table->index('u_id');
        });

        Schema::table('mdm_customer_contact', function (Blueprint $table) {
            $table->index('u_id');
        });

        Schema::table('mdm_customer_identity', function (Blueprint $table) {
            $table->index('u_id');
        });

        Schema::table('mdm_customer_product', function (Blueprint $table) {
            $table->index('u_id');
        });

        Schema::table('mdm_customer_unit', function (Blueprint $table) {
            $table->index('u_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mdm_customer_address', function (Blueprint $table) {
            $table->dropIndex(['u_id']);
        });

        Schema::table('mdm_customer_bank_account', function (Blueprint $table) {
            $table->dropIndex(['u_id']);
        });

        Schema::table('mdm_customer_contact', function (Blueprint $table) {
            $table->dropIndex(['u_id']);
        });

        Schema::table('mdm_customer_identity', function (Blueprint $table) {
            $table->dropIndex(['u_id']);
        });

        Schema::table('mdm_customer_product', function (Blueprint $table) {
            $table->dropIndex(['u_id']);
        });

        Schema::table('mdm_customer_unit', function (Blueprint $table) {
            $table->dropIndex(['u_id']);
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResetSequentialPkeyToAddressDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mdm_customer_address', function (Blueprint $table) {
            $table->dropColumn('id');
        });

        Schema::table('mdm_customer_address', function (Blueprint $table) {
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
        Schema::table('mdm_customer_address', function (Blueprint $table) {
            //
        });
    }
}

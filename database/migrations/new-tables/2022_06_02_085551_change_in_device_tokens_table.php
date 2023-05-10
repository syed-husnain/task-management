<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeInDeviceTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('device_tokens', function (Blueprint $table) {
            $table->string('merchant_user_id')->nullable()->after('customer_id');
            $table->string('merchant_id')->nullable()->after('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('device_tokens', function (Blueprint $table) {
            $table->dropColumn('merchant_user_id');
            $table->dropColumn('merchant_id');
        });
    }
}

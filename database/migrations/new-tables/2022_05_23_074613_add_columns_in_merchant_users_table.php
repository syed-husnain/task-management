<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsInMerchantUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merchant_users', function (Blueprint $table) {
            $table->string('profile_image')->nullable()->after('status');
            $table->boolean('order_notification')->default(true)->after('profile_image');
            $table->boolean('offer_notification')->default(true)->after('order_notification');
            $table->boolean('other_notification')->default(true)->after('offer_notification');
            $table->string('verification_code', 15)->nullable()->after('other_notification');
            $table->boolean('is_deactivated')->default(false)->after('verification_code');
            $table->string('latitude')->nullable()->after('is_deactivated');
            $table->string('longitude')->nullable()->after('latitude');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merchant_users', function (Blueprint $table) {
            $table->dropColumn('profile_image');
            $table->dropColumn('order_notification');
            $table->dropColumn('offer_notification');
            $table->dropColumn('other_notification');
            $table->dropColumn('verification_code');
            $table->dropColumn('is_deactivated');
        });
    }
}

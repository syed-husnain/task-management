<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Change01InCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coupons', function (Blueprint $table) {
            //
            $table->double('min_amount', 10, 2)->nullable()->after('discount');
            $table->double('max_amount', 12, 2)->nullable()->after('min_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupons', function (Blueprint $table) {
            //
            $table->dropColumn('min_amount');
            $table->dropColumn('max_amount');
        });
    }
}

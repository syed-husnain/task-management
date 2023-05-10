<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('destination_address')->after('merchant_id')->nullable();
            $table->double('origin_latitude', 12, 5)->after('destination_address')->nullable();
            $table->double('origin_longitude', 12, 5)->after('origin_latitude')->nullable();
            $table->double('destination_latitude', 12, 5)->after('origin_longitude')->nullable();
            $table->double('destination_longitude', 12, 5)->after('destination_latitude')->nullable();
            $table->integer('distance')->after('destination_longitude')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};

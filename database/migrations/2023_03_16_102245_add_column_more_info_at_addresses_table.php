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
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropIndex(['city_id']);
            $table->dropIndex(['district_id']);
            $table->dropColumn('city_id');
            $table->dropColumn('district_id');
            $table->string('email')->after('phone')->nullable();
            $table->string('city_name')->after('address')->nullable();
            $table->string('district_name')->after('city_name')->nullable();
            $table->string('more_info')->after('zip_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
            //
        });
    }
};

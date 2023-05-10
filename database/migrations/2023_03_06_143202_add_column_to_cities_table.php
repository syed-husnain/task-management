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
        Schema::table('cities', function (Blueprint $table) {
            $table->integer('region_id')->nullable()->after('name_arabic');
        });

        Schema::table('countries', function (Blueprint $table) {
            $table->string('name_arabic')->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->dropColumn('region_id');
        });

        Schema::table('countries', function (Blueprint $table) {
            $table->dropColumn('name_arabic');
        });
    }
};

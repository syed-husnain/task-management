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
        Schema::table('category_level1', function (Blueprint $table) {
            $table->string('old_slug')->after('name_ar')->nullable();
            $table->longText('meta_description')->after('status')->nullable();
        });
        Schema::table('category_level2', function (Blueprint $table) {
            $table->string('old_slug')->after('name_ar')->nullable();
            $table->longText('meta_description')->after('status')->nullable();
        });
        Schema::table('category_level3', function (Blueprint $table) {
            $table->string('old_slug')->after('name_ar')->nullable();
            $table->longText('meta_description')->after('status')->nullable();
        });
        Schema::table('category_level4', function (Blueprint $table) {
            $table->string('old_slug')->after('name_ar')->nullable();
            $table->longText('meta_description')->after('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_level1', function (Blueprint $table) {
            $table->dropColumn('old_slug');
            $table->dropColumn('meta_description');
        });
        Schema::table('category_level2', function (Blueprint $table) {
            $table->dropColumn('old_slug');
            $table->dropColumn('meta_description');
        });
        Schema::table('category_level3', function (Blueprint $table) {
            $table->dropColumn('old_slug');
            $table->dropColumn('meta_description');
        });
        Schema::table('category_level4', function (Blueprint $table) {
            $table->dropColumn('old_slug');
            $table->dropColumn('meta_description');
        });
    }
};

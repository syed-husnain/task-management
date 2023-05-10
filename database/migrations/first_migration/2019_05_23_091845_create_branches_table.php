<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('branch_name_en');
            $table->string('branch_name_ar');
            $table->integer('merchant_id')->unsigned()->index();
            $table->integer('district_id')->unsigned()->index();
            $table->integer('city_id')->unsigned()->index();
            $table->integer('country_id')->unsigned()->index();
            $table->string('address_en');
            $table->string('address_ar');
            $table->string('phone', 20)->unique();
            $table->double('lat', 15, 8)->nullable();
            $table->double('lng', 15, 8)->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });

        Schema::table('branches', function (Blueprint $table) {
            $table->foreign('merchant_id')->references('id')->on('merchants');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}

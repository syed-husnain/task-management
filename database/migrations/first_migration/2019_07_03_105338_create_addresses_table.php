<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned()->index();
            $table->boolean('type')->default(false);
            $table->string('address')->nullable;
            $table->integer('city_id')->unsigned()->index();
            $table->integer('district_id')->unsigned()->index();
            $table->integer('country_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('addresses', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('district_id')->references('id')->on('districts');
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
        Schema::dropIfExists('addresses');
    }
}

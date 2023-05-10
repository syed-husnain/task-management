<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merchant_id')->unsigned()->index();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone', 20)->unique();
            $table->string('profile_image')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('is_deleted')->default(false);
            $table->timestamp('last_login')->default(time());
            $table->string('verification_code', 15)->nullable();
            $table->boolean('is_deactivated')->default(false);
            $table->string('device_token')->nullable()->default(Null);
            $table->timestamps();
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('merchant_id')->references('id')->on('merchants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}

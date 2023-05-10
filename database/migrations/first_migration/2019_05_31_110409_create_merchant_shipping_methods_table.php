<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantShippingMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_shipping_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merchant_id')->unsigned()->index();
            $table->integer('shipping_method_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('merchant_shipping_methods', function (Blueprint $table) {
            $table->foreign('merchant_id')->references('id')->on('merchants');
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchant_shipping_methods');
    }
}

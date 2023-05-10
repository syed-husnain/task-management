<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListDiscountProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_discount_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->index();
            $table->integer('discount_id')->unsigned()->index();
            $table->timestamps();
        });
        Schema::table('list_discount_products', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('merchant_products');
            $table->foreign('discount_id')->references('id')->on('order_discounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_discount_products');
    }
}

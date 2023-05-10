<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartWishListItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_wish_list_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cart_wish_list_id')->unsigned()->index();
            $table->integer('merchant_product_id')->unsigned()->index();
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });

        Schema::table('cart_wish_list_items', function (Blueprint $table) {
            $table->foreign('cart_wish_list_id')->references('id')->on('cart_wish_lists');
            $table->foreign('merchant_product_id')->references('id')->on('merchant_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_wish_list_items');
    }
}

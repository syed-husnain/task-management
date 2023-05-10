<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merchant_id')->unsigned()->index();
            $table->integer('branch_id')->unsigned()->index();
            $table->integer('brand_id')->unsigned()->index();
            $table->integer('product_id')->unsigned()->index();
            $table->double('base_price', 10, 2);
            $table->double('price_with_tax', 10, 2);
            $table->double('offer_price', 10, 2)->nullable();
            $table->double('tax', 10, 2);
            $table->integer('cat_level1')->unsigned()->index();
            $table->integer('cat_level2')->nullable();
            $table->integer('cat_level3')->nullable();
            $table->integer('cat_level4')->nullable();
            $table->boolean('availability')->default(true);
            $table->integer('available_quantity')->unsigned()->default(0);
            $table->string('min_order_level');
            $table->string('attributes');
            $table->integer('packaging');
            $table->integer('unit_packing');
            $table->integer('merchant_user_id')->unsigned()->index();
            $table->boolean('featured')->default(false);
            $table->boolean('status')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });

        Schema::table('merchant_products', function (Blueprint $table) {
            $table->foreign('merchant_id')->references('id')->on('merchants');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('cat_level1')->references('id')->on('category_level1');
            $table->foreign('origin_country')->references('id')->on('countries');
            $table->foreign('merchant_user_id')->references('id')->on('merchant_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchant_products');
    }
}

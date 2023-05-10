<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requested_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_en');
            $table->string('name_ar');
            $table->integer('category_level1_id')->unsigned()->index();
            $table->integer('category_level2_id')->nullable();
            $table->integer('category_level3_id')->nullable();
            $table->integer('category_level4_id')->nullable();
            $table->integer('brand_id')->unsigned()->index();
            $table->text('description_en');
            $table->text('description_ar');
            $table->string('packing_unit')->nullable();
            $table->string('packaging')->nullable();
            $table->string('attributes')->nullable();
            $table->integer('merchant_id')->unsigned()->index();
            $table->integer('merchant_user_id')->unsigned()->index();
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
        Schema::table('requested_products', function (Blueprint $table) {
            $table->foreign('category_level1_id')->references('id')->on('category_level1');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('merchant_id')->references('id')->on('merchants');
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
        Schema::dropIfExists('requested_products');
    }
}

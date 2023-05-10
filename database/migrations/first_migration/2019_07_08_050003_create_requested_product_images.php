<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestedProductImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requested_product_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('requested_product_id')->unsigned()->index();
            $table->string('image_url');
            $table->timestamps();
        });

        Schema::table('requested_product_images', function (Blueprint $table) {
            $table->foreign('requested_product_id')->references('id')->on('requested_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

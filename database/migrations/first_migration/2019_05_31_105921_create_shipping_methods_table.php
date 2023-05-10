<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('method');
            $table->boolean('is_free')->default(false);
            $table->integer('min_order_amount')->nullable();
            $table->integer('fixed_cost')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('area_cost')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_methods');
    }
}

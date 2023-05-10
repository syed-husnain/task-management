<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->integer('order_min_value')->unsigned()->nullable();
            $table->integer('order_max_value')->unsigned()->nullable();
            $table->integer('merchant_id')->unsigned()->index();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('cat_level1')->nullable();
            $table->integer('cat_level2')->nullable();
            $table->integer('cat_level3')->nullable();
            $table->integer('cat_level4')->nullable();
            $table->integer('percentage')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
        Schema::table('order_discounts', function (Blueprint $table) {
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
        Schema::dropIfExists('order_discounts');
    }
}

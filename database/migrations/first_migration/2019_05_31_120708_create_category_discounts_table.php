<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_level1_id')->unsigned()->index();
            $table->integer('category_level2_id')->unsigned()->nullable();
            $table->integer('category_level3_id')->unsigned()->nullable();
            $table->integer('category_level4_id')->unsigned()->nullable();
            $table->integer('merchant_id')->unsigned()->index();
            $table->date('start_date');
            $table->date('end_date');
            $table->double('percentage', 3, 2)->nullable()->default(0.0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
        Schema::table('category_discounts', function (Blueprint $table) {
            $table->foreign('category_level1_id')->references('id')->on('category_level1');
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
        Schema::dropIfExists('category_discounts');
    }
}

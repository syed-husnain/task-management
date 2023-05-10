<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merchant_id')->unsigned()->index();
            $table->integer('customer_id')->unsigned()->index();
            $table->double('rating', 2, 1)->default(0.0);
            $table->text('content', 512)->nullable();
            $table->timestamps();
        });
        Schema::table('merchant_reviews', function (Blueprint $table) {
            $table->foreign('merchant_id')->references('id')->on('merchants');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchant_reviews');
    }
}

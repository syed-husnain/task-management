<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_inquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned()->index();
            $table->integer('product_id')->unsigned()->index();
            $table->string('phone');
            $table->string('email');
            $table->string('message');
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });

        Schema::table('product_inquiries', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_inquiries');
    }
}

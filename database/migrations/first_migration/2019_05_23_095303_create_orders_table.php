<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned()->index();
            $table->integer('branch_id')->unsigned()->index();
            $table->integer('merchant_id')->unsigned()->index();
            $table->double('gross_total', 12, 2);
            $table->double('discount', 12, 2);
            $table->double('net_total', 12, 2);
            $table->enum('order_status', ['Pending', 'Shipped', 'Delivered', 'Completed'])->default('Pending');
            $table->string('payment_method');
            $table->enum('payment_status', ['Received', 'Not Received'])->default('Not Received');
            $table->integer('shipping_method_id')->unsigned()->index();
            $table->integer('billing_address_id')->unsigned()->index();
            $table->integer('shipping_address_id')->unsigned()->index();
            $table->integer('deliver_person')->nullable();
            $table->timestamps();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('billing_address_id')->references('id')->on('addresses');
            $table->foreign('shipping_address_id')->references('id')->on('addresses');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('merchant_id')->references('id')->on('merchants');
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

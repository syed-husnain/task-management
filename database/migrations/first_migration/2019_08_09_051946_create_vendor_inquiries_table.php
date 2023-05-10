<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_inquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned()->index();
            $table->integer('merchant_id')->unsigned()->index();
            $table->integer('branch_id')->unsigned()->index()->nullable;
            $table->string('phone', 20);
            $table->string('email');
            $table->string('message');
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });

        Schema::table('vendor_inquiries', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('merchant_id')->references('id')->on('merchants');
            $table->foreign('branch_id')->references('id')->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_inquiries');
    }
}

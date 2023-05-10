<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNullableInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->integer('customer_id')->nullable()->change();
            $table->integer('product_id')->nullable()->change();
            $table->integer('merchant_id')->nullable()->change();
            $table->integer('branch_id')->nullable()->change();
            $table->string('phone', 20)->nullable()->change();
            $table->string('name')->after('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->integer('customer_id');
            $table->integer('product_id');
            $table->integer('merchant_id');
            $table->integer('branch_id');
            $table->string('phone', 20);
            $table->string('name')->after('phone')->nullable();
        });
    }
}

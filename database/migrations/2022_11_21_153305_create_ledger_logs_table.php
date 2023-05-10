<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgerLogsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('ledger_logs');
        Schema::dropIfExists('daily_stock_logs');

        Schema::create('ledger_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id', false, true);
            $table->string('merchant_name', 255)->nullable();
            $table->integer('merchant_id', false, true)->nullable();
            $table->integer('price_in', false, true)->nullable();
            $table->integer('price_out', false, true)->nullable();
            $table->integer('offer_price_in', false, true)->nullable();
            $table->integer('offer_price_out', false, true)->nullable();
            $table->integer('quantity_in', false, true)->nullable();
            $table->integer('quantity_out', false, true)->nullable();
            $table->timestamp('assignee_date', false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ledger_logs');
    }
}

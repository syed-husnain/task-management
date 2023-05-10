<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPriceOfferPriceProductTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('price')
                ->unsigned()
                ->after('description_ar');
            $table->integer('offer_price')
                ->unsigned()
                ->nullable()
                ->after('price');
            $table->integer('quantity')
                ->unsigned()
                ->nullable()
                ->after('offer_price');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('offer_price');
            $table->dropColumn('quantity');
        });
    }
}

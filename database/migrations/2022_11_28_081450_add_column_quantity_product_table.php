<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnQuantityProductTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {

            $table->integer('quantity')
                ->unsigned()
                ->nullable()
                ->after('offer_price');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('quantity');
        });
    }
}

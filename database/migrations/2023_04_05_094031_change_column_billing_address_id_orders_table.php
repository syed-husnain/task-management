<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {

            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $indexesFound = $sm->listTableIndexes('orders');

            if(array_key_exists("orders_billing_address_id_index", $indexesFound))
                $table->dropUnique("orders_billing_address_id_index");
            if(array_key_exists("orders_shipping_address_id_index", $indexesFound))
                $table->dropUnique("orders_shipping_address_id_index");


            $table->integer('billing_address_id')->nullable()->change();
            $table->integer('shipping_address_id')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};

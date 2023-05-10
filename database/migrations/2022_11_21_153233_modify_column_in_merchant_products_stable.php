<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyColumnInMerchantProductsStable extends Migration
{
    public function up()
    {
        Schema::table('merchant_products', function (Blueprint $table) {
            $table->string('branch_id', 20)->nullable()->change();
            $table->string('brand_id', 20)->nullable()->change();
            $table->string('in_clearance', 20)->nullable()->change();
            $table->string('type_of_tax', 20)->nullable()->change();
            $table->string('business_base_price', 20)->nullable()->change();
        });
    }

    public function down()
    {

    }
}

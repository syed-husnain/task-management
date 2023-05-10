<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE merchant_products CHANGE COLUMN merchant_user_id merchant_user_id INT(10) UNSIGNED NULL");
        DB::statement("ALTER TABLE merchant_users CHANGE COLUMN merchant_id merchant_id INT(10) UNSIGNED NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

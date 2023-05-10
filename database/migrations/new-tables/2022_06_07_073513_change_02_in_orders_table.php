<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Change02InOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE orders MODIFY COLUMN order_status ENUM('Pending','Processing','Accepted','Rejected','Ready For Pickup','Modified','Shipped','Delivered','Completed','Cancel','Partial Complete') DEFAULT 'Pending'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE orders MODIFY COLUMN order_status ENUM('Pending','Accepted','Processing','Shipped','Delivered','Completed','Cancel','Partial Complete') DEFAULT 'Pending'");
    }
}

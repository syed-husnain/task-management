<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeIn01OrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->enum('merchant_status',['Pending','Accepted','Rejected'])->default('Pending');
            $table->string('merchant_reason')->nullable();
            $table->enum('delivery_person_status',['Pending','Accepted','Rejected'])->default('Pending');
            $table->string('delivery_person_reason')->nullable();
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
            $table->dropColumn('merchant_status');
            $table->dropColumn('merchant_reason');
            $table->dropColumn('delivery_person_status');
            $table->dropColumn('delivery_person_reason');
        });
    }
}

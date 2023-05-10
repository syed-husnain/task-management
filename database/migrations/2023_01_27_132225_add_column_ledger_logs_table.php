<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnLedgerLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ledger_logs', function (Blueprint $table) {
            $table->enum('type',['Issuance','Return','Waste'])->default('Issuance')->after('quantity_out');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ledger_logs', function (Blueprint $table) {
            //
        });
    }
}

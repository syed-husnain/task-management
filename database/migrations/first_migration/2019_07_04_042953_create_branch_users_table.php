<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('branch_id')->unsigned()->index();
            $table->integer('merchant_user_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('branch_users', function (Blueprint $table) {
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('merchant_user_id')->references('id')->on('merchant_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch_users');
    }
}

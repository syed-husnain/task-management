<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('merchant_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merchant_id')->unsigned()->index();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone', 20)->unique();
            $table->string('profile_image')->nullable();
            $table->integer('role_id')->unsigned()->index();
            $table->string('password');
            $table->boolean('status')->default(true);
            $table->boolean('is_deleted')->default(false);
            $table->timestamp('last_login')->default(time());
            $table->boolean('order_notification')->default(true);
            $table->boolean('offer_notification')->default(true);
            $table->boolean('other_notification')->default(true);

            
            $table->string('verification_code', 15)->nullable();
            $table->boolean('is_deactivated')->default(false);
            $table->string('device_token')->nullable()->default(Null);
            $table->timestamps();
        });

        Schema::table('merchant_users', function (Blueprint $table) {
            $table->foreign('merchant_id')->references('id')->on('merchants');
            $table->foreign('role_id')->references('id')->on('merchant_user_roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchant_users');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone', 20)->unique();
            $table->string('contact_person');
            $table->string('company_address');
            $table->string('company_name_en');
            $table->string('company_name_ar');
            $table->string('logo_url');
            $table->string('license_number');
            $table->string('registeration_number');
            $table->date('registeration_expiry');
            $table->string('tax_registeration_number');
            $table->date('tax_registeration_expiry');
            $table->string('document_url');
            $table->string('delivery_opening_day')->nullable();
            $table->string('delivery_closing_day')->nullable();
            $table->string('opening_time')->nullable();
            $table->string('closing_time')->nullable();
            $table->string('delivery_opening_time')->nullable();
            $table->string('delivery_closing_time')->nullable();
            $table->string('shipping_method');
            $table->double('rating', 2, 2)->default(0.0);
            $table->boolean('status')->default(true);
            $table->boolean('is_approved')->default(false);
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchants');
    }
}

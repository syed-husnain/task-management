<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_en');
            $table->string('name_ar');
            $table->integer('category_level1_id')->unsigned()->index();
            $table->integer('category_level2_id')->nullable();
            $table->integer('category_level3_id')->nullable();
            $table->integer('category_level4_id')->nullable();
            $table->integer('brand_id')->unsigned()->index();
            $table->string('thumbnail')->nullable();
            $table->text('description_en');
            $table->text('description_ar');
            $table->string('packing_unit')->nullable();
            $table->string('packaging')->nullable();
            $table->string('attributes')->nullable();
            $table->string('barcode')->unique();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_level1_id')->references('id')->on('category_level1');
            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

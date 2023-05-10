<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryLevel3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_level3', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_en');
            $table->string('name_ar');
            $table->integer('category_level2_id')->unsigned()->index();
            $table->string('image_url')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
        Schema::table('category_level3', function (Blueprint $table) {
            $table->foreign('category_level2_id')->references('id')->on('category_level2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_level3');
    }
}

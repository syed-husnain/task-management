<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryLevel4Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_level4', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_en');
            $table->string('name_ar');
            $table->integer('category_level3_id')->unsigned()->index();
            $table->string('image_url')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
        Schema::table('category_level4', function (Blueprint $table) {
            $table->foreign('category_level3_id')->references('id')->on('category_level3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_level4');
    }
}

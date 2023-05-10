<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    public function up()
    {
        $this->down();

        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_en', 255);
            $table->string('name_ar', 255)->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->integer('product_id', false, true)->nullable();
            $table->string('url', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('banners');
    }
}

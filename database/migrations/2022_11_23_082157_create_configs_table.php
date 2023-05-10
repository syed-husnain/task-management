<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigsTable extends Migration
{
    public function up()
    {
        $this->down();
        Schema::create('configs', function (Blueprint $table) {
            $table->increments('id');

            $table->text('why_us')->nullable();
            $table->text('vision')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('google_map_url', 255)->nullable();

            $table->string('facebook_url', 255)->nullable();
            $table->string('whatsapp_no', 30)->nullable();
            $table->string('instagram_url', 255)->nullable();
            $table->string('twitter_url', 255)->nullable();

//            $table->string('youtube_url')->nullable();
//            $table->string('linkedin_url')->nullable();

//            $table->string('watermark_url')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('configs');
    }
}

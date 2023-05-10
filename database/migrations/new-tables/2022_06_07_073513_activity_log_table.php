<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActivityLogTable extends Migration
{
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('notifiable');
            $table->string('submitted_type')->nullable();
            $table->unsignedBigInteger('submitted_id')->nullable();
            $table->string('submitted_by')->nullable();
            $table->string('action')->nullable();
            $table->json('data')->nullable();
            $table->json('original_data')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('activity_logs');
    }
}


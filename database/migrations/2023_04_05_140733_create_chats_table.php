<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('receiver_id');
            $table->unsignedInteger('last_receiver_type')->nullable(); // 0 for sender , 1 for receiver
            $table->string('last_message')->nullable();
            $table->string('message_type')->nullable();
            $table->boolean('is_read')->default(false);
            $table->boolean('is_archived')->default(false);
            $table->boolean('status')->default(true);
            $table->dateTime('last_time')->nullable();
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
        Schema::dropIfExists('chats');
    }
};

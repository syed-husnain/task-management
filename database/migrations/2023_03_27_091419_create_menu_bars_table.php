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
        Schema::create('menu_bars', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->default(0);
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('old_slug')->nullable();
            $table->string('slug');
            $table->string('route')->nullable();
            $table->integer('ordering')->default(0);
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('menu_bars');
    }
};

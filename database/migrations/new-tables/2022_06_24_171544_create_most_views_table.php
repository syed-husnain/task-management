<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMostViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('most_views', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('viewable');
            $table->text('visitor')->nullable();
            $table->enum('platform',['web','android','ios'])->nullable();
            $table->timestamp('viewed_at')->useCurrent();
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
        Schema::dropIfExists('most_views');
    }
}

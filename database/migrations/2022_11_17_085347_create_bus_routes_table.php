<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_routes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bus_id')->unsigned()->index();
            $table->string('start_destination');
            $table->string('start_latitude');
            $table->string('start_longitude');
            $table->string('end_destination');
            $table->string('end_latitude');
            $table->string('end_longitude');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('bus_id')->references('id')->on('merchants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bus_routes');
    }
}

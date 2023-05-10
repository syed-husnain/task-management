<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouteStopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_stops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('route_id')->unsigned()->index();
            $table->string('stop');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();
            $table->foreign('route_id')->references('id')->on('bus_routes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('route_stops');
    }
}

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
        Schema::create('terrain_planet', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('planet_id')->unsigned();
            $table->foreign('planet_id')
                ->references('id')
                ->on('planets')->onDelete('cascade');
            $table->bigInteger('terrain_id')->unsigned();
            $table->foreign('terrain_id')
                ->references('id')
                ->on('terrains')->onDelete('cascade');
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
        Schema::dropIfExists('terrain_planet');
    }
};

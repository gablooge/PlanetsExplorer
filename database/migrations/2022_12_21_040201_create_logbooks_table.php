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
        Schema::create('logbooks', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("note")->nullable();
            $table->text("mood")->nullable();
            $table->string("weather")->nullable();
            $table->string("lat");
            $table->string("long");
            $table->bigInteger("people_id")->unsigned();
            $table->foreign("people_id")
                ->references("id")
                ->on("people")->onDelete('cascade');
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
        Schema::dropIfExists('logbooks');
    }
};

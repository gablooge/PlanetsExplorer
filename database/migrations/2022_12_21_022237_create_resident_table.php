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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("people_id")->unsigned();
            $table->foreign('people_id')
                ->references("id")
                ->on("people")->onDelete("cascade");
            $table->bigInteger("planet_id")->unsigned();
            $table->foreign('planet_id')
                ->references("id")
                ->on("planets")->onDelete("cascade");
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
        Schema::dropIfExists('residents');
    }
};

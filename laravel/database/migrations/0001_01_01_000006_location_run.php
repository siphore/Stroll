<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('location_run', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('locations_id')->unsigned();
            $table->integer('runs_id')->unsigned();
            $table->foreign('locations_id')->references('id')->on('locations')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('runs_id')->references('id')->on('runs')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_run');
    }
};

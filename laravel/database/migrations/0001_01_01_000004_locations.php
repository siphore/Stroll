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
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id'); // Primary key
            $table->string('name', 65);
            $table->decimal('lat', 17, 14); // Latitude with precision 17 and scale 14
            $table->decimal('log', 17, 14); // Longitude with precision 17 and scale 14
            $table->text('descr');
            $table->text('img');
            $table->text('access');
            $table->string('city');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};

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
            $table->decimal('lat', 8, 2); // Adjusted precision and scale
            $table->decimal('log', 8, 2); // Adjusted precision and scale
            $table->string('descr', 65);
            $table->string('img', 65);
            $table->string('acess', 65);
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

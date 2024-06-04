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
        Schema::create('runs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 65);
            $table->string('img', 65);
            $table->string('descr', 65);
            $table->enum('district', [
                'Aigle',
                'Broye-Vully',
                'Gros-de-Vaud',
                'Jura-Nord vaudois',
                'Lausanne',
                'Lavaux-Oron',
                'Morges',
                'Nyon',
                'Ouest Lausanne',
                'Riviera-Pays-d_Enhaut' // Corrected escape for single quote
            ]);
            $table->decimal('duration', 8, 2);
            $table->decimal('distance', 8, 2);
            $table->enum('level_difficulty', ['Facile', 'Moyen', 'Difficile']);
            $table->boolean('printemps');
            $table->boolean('ete');
            $table->boolean('automne');
            $table->boolean('hiver');
            $table->boolean('family');
            $table->boolean('school');
            $table->boolean('senior');
            $table->boolean('handicap');
            $table->boolean('dogs');
            $table->boolean('parkings');
            $table->boolean('public_transport');
            $table->boolean('mobility');
            $table->boolean('scroller');
            $table->boolean('table_picnic');
            $table->boolean('bench');
            $table->boolean('wc');
            $table->boolean('place_fire');
            $table->boolean('game_place');
            $table->integer('rating');
            $table->unsignedInteger('location_id'); // Changed to match the expected foreign key
            $table->unsignedInteger('type_id'); // Changed to match the expected foreign key
            $table->timestamps();

            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade'); // Corrected table name
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('runs');
    }
};

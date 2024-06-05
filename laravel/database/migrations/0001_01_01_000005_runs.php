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
            $table->text('img');
            $table->decimal('departure', 8, 2);
            $table->decimal('arrival', 8, 2);
            $table->text('descr');
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
                'Riviera-Pays-d_Enhaut',
            ]);
            $table->decimal('duration', 8, 2);
            $table->decimal('distance', 8, 2);
            $table->enum('level_difficulty', ['Facile', 'Moyen', 'Difficile']);
            $table->enum('season', ['Printemps', 'Ete', 'Automne', 'Hiver']);
            $table->boolean('family')->default(false);
            $table->boolean('school')->default(false);
            $table->boolean('senior')->default(false);
            $table->boolean('handicap')->default(false);
            $table->boolean('dogs')->default(false);
            $table->boolean('parkings')->default(false);
            $table->boolean('public_transport')->default(false);
            $table->boolean('mobility')->default(false);
            $table->boolean('scroller')->default(false);
            $table->boolean('table_picnic')->default(false);
            $table->boolean('bench')->default(false);
            $table->boolean('wc')->default(false);
            $table->boolean('fireplace')->default(false);
            $table->boolean('playground')->default(false);
            $table->integer('rating')->default(0);
            $table->unsignedInteger('location_id');
            $table->unsignedInteger('type_id');
            $table->timestamps();

            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
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

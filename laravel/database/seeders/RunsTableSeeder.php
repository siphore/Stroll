<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Run;

class RunsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Run::create([
            'name' => 'Sentier 1',
            'descr' => 'La promenade de la ville de Lausanne, autour de la cathédrale, offre une immersion historique à travers ses ruelles pavées et son architecture gothique. Depuis la terrasse panoramique, les visiteurs profitent d\'une vue splendide sur le lac Léman et les Alpes, alliant culture et paysages magnifiques. La cathédrale est accessible à pied depuis la gare de Lausanne en environ 20 minutes. Il existe également plusieurs lignes de bus et de métro qui desservent le centre-ville de Lausanne, facilitant l\'accès à la cathédrale.',
            'district' => 'Lausanne',
            'img' => 'https://www.holidify.com/places/lausanne/cathdrale-de-notre-dame-sightseeing-10801.html',
            'departure' => '6.635333910113104, 46.5223567913246',
            'arrival' => '6.635231119566697, 46.52323582302864',
            'distance' => '20',
            'duration' => '60',
            'level_difficulty' => 'Facile',
            'season' => 'Ete',
            'family' => true,
            'mobility' => true,
            'scroller' => true,
            'bench' => true,
            'type_id' => 1,
            // 'users_id' => 1,
            'location_id' => 1

        ]);


    }
}

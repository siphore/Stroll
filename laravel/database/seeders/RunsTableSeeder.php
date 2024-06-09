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
            'name' => 'Sentier de la Cité',
            'descr' => 'La promenade de la ville de Lausanne, autour de la cathédrale, offre une immersion historique à travers ses ruelles pavées et son architecture gothique. Depuis la terrasse panoramique, les visiteurs profitent d\'une vue splendide sur le lac Léman et les Alpes, alliant culture et paysages magnifiques. La cathédrale est accessible à pied depuis la gare de Lausanne en environ 20 minutes. Il existe également plusieurs lignes de bus et de métro qui desservent le centre-ville de Lausanne, facilitant l\'accès à la cathédrale.',
            'district' => 'Lausanne',
            'img' => 'https://www.holidify.com/images/cmsuploads/compressed/Kathedrale_Lausanne_20190116135515.jpg',
            'departure' => '6.635333910113104, 46.5223567913246',
            'arrival' => '6.635231119566697, 46.52323582302864',
            'distance' => '2',
            'duration' => '60',
            'level_difficulty' => 'Facile',
            'season' => json_encode(['Été']),
            'rating' => '4.3',
            'family' => true,
            'mobility' => true,
            'scroller' => true,
            'bench' => true,
            'wc' => true,
            'type_id' => 1,
            // 'users_id' => 1,
            'location_id' => 1
        ]);

        Run::create([
            'name' => 'Sentier des narcisses',
            'descr' => 'Cette promenade thématique devrait être entreprise au printemps (mai à juin). C’est à ce moment-là que les narcisses fleurissant à l’état sauvage transforment les prairies des hauts de Vevey et Montreux en une mer de fleurs blanches. On dirait qu’il a neigé. C’est pourquoi les habitants surnomment ce rare spectacle naturel «neige de mai». Il attire chaque année de nombreux visiteurs au Lac Léman. Un sentier didactique consacré aux narcisses commence aux Avants. Ce village aux allures de Belle Epoque est l’une des plus anciennes stations de sports d’hiver de Suisse. Le sentier est jalonné de panneaux explicatifs, pour permettre aux randonneurs de mieux comprendre la géologie, la faune et la flore de ces lieux.',
            'district' => 'Riviera-Pays-d_Enhaut',
            'img' => 'https://awwway.ch/wp-content/uploads/2017/06/Pleiades_sentier_narcisses_Montreux_7.jpg',
            'departure' => '6.911926293544639, 46.451720292241106',
            'arrival' => '6.863817057070378, 46.4669099100895',
            'distance' => '2',
            'duration' => '60',
            'level_difficulty' => 'Facile',
            'season' => json_encode(['Printemps', 'Été']),
            'rating' => '3.9',
            'family' => true,
            'mobility' => true,
            'scroller' => true,
            'table_picnic' => true,
            'type_id' => 1,
            // 'users_id' => 1,
            'location_id' => 1
        ]);
    }
}

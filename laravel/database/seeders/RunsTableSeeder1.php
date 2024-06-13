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
            'name' => 'Le Petit Niremont',
            'descr' => 'Le Petit Niremont est un charmant sentier de randonnée offrant des vues panoramiques sur les Préalpes fribourgeoises et le lac Léman. Cette boucle facile commence et se termine à la station Les Paccots, traversant des pâturages alpins et des forêts paisibles. C\'est une randonnée idéale pour les familles et les amateurs de nature.',
            'district' => 'Châtel-Saint-Denis',
            'img' => 'https://fribourg.ch/wp-content/uploads/2021/11/paccots-63727-lespaccots-niremont-automne2017cpascalgertschen-6_3000-2560x1707.jpg',
            'departure' => '6.975, 46.517',
            'arrival' => '6.975, 46.517',
            'distance' => '6.5',
            'duration' => '120',
            'level_difficulty' => 'Facile',
            'season' => json_encode(['Printemps', 'Été', 'Automne']),
            'rating' => '4.5',
            'family' => true,
            'mobility' => false,
            'scroller' => false,
            'bench' => true,
            'wc' => false,
            'type_id' => 2,
            'location_id' => 1
        ]);

        Run::create([
            'name' => 'Circuit du Teysachaux',
            'descr' => 'Le Circuit du Teysachaux est une randonnée exigeante qui mène au sommet du Teysachaux, offrant des vues spectaculaires sur les Alpes fribourgeoises et le lac Léman. La randonnée commence aux Rosalys et traverse des crêtes rocheuses avant d\'atteindre le sommet. Le parcours descend ensuite vers Le Moléson et Plan-Francey.',
            'district' => 'Les Paccots',
            'img' => 'https://fribourg.ch/wp-content/uploads/2021/11/DSCF0054_s.jpg',
            'departure' => '6.971, 46.508',
            'arrival' => '7.016, 46.584',
            'distance' => '12',
            'duration' => '450',
            'level_difficulty' => 'Difficile',
            'season' => json_encode(['Été']),
            'rating' => '4.7',
            'family' => false,
            'mobility' => false,
            'scroller' => false,
            'bench' => false,
            'wc' => true,
            'type_id' => 3,
            'location_id' => 2
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
            'type_id' => 4,
            // 'users_id' => 1,
            'location_id' => 1
        ]);

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
            'type_id' => 2,
            // 'users_id' => 1,
            'location_id' => 1
        ]);
        Run::create([
            'name' => 'Sentier du Flon',
            'descr' => 'Le Sentier du Flon traverse le cœur de Lausanne, en passant par le quartier animé du Flon, autrefois une zone de stockage réhabilitée en un espace de vie moderne avec restaurants, bars, clubs, et boutiques. Le sentier offre également des vues panoramiques sur la ville et les montagnes du Jura.',
            'district' => 'Lausanne',
            'img' => 'https://www.locationscout.net/images/36046.jpg',
            'departure' => '6.63044, 46.52111',
            'arrival' => '6.66927, 46.54713',
            'distance' => '4',
            'duration' => '90',
            'level_difficulty' => 'Facile',
            'season' => json_encode(['Été', 'Printemps']),
            'rating' => '4.5',
            'family' => true,
            'mobility' => true,
            'scroller' => true,
            'bench' => true,
            'wc' => true,
            'type_id' => 2,
            'location_id' => 1
        ]);

        Run::create([
            'name' => 'Sentier de la Sallaz',
            'descr' => 'Le Sentier de la Sallaz est une promenade agréable à travers des parcs verdoyants et des quartiers résidentiels calmes. Le sentier offre des vues sur le paysage urbain de Lausanne ainsi que sur les montagnes environnantes.',
            'district' => 'Lausanne',
            'img' => 'https://s1.wklcdn.com/image_47/1414057/165765621/103670098Master.jpg',
            'departure' => '6.65321, 46.53657',
            'arrival' => '6.67342, 46.54789',
            'distance' => '3',
            'duration' => '60',
            'level_difficulty' => 'Facile',
            'season' => json_encode(['Printemps', 'Automne']),
            'rating' => '4.2',
            'family' => true,
            'mobility' => true,
            'scroller' => true,
            'bench' => true,
            'wc' => true,
            'type_id' => 2,
            'location_id' => 1
        ]);

        Run::create([
            'name' => 'Sentier Lausanne Lumières',
            'descr' => 'Le Sentier Lausanne Lumières est un parcours nocturne illuminé qui traverse les points d’intérêt majeurs de la ville, mettant en valeur les bâtiments historiques et les œuvres d’art lumineuses.',
            'district' => 'Lausanne',
            'img' => 'https://static.mycity.travel/manage/uploads/6/13/283262/1/festival-lausanne-lumieres-2020-projection-sur-palais-de-rumine-a-la-riponne_3000.jpg',
            'departure' => '6.63341, 46.51972',
            'arrival' => '6.63851, 46.52183',
            'distance' => '1.5',
            'duration' => '45',
            'level_difficulty' => 'Facile',
            'season' => json_encode(['Hiver']),
            'rating' => '4.8',
            'family' => true,
            'mobility' => true,
            'scroller' => true,
            'bench' => true,
            'wc' => true,
            'type_id' => 2,
            'location_id' => 1
        ]);

        Run::create([
            'name' => 'Sentier des Rochers des Rayes',
            'descr' => 'Le Sentier des Rochers des Rayes offre une randonnée plus sportive avec des vues imprenables sur les Alpes vaudoises et les formations rocheuses caractéristiques. C’est une destination prisée des amateurs de nature et de paysages alpins.',
            'district' => 'Vaud',
            'img' => 'https://randodze.ch/wp-content/uploads/2020/09/IMG_0151-scaled.jpg',
            'departure' => '6.82512, 46.53091',
            'arrival' => '6.84532, 46.55023',
            'distance' => '5',
            'duration' => '150',
            'level_difficulty' => 'Modéré',
            'season' => json_encode(['Été', 'Printemps']),
            'rating' => '4.7',
            'family' => false,
            'mobility' => false,
            'scroller' => false,
            'bench' => true,
            'wc' => false,
            'type_id' => 1,
            'location_id' => 2
        ]);

        Run::create([
            'name' => 'Sentier de la Truite à Morges',
            'descr' => 'Le Sentier de la Truite à Morges suit la rivière La Morges, offrant une balade paisible à travers des paysages naturels avec la possibilité d’observer des truites dans leur habitat. Le parcours est idéal pour les familles et les amateurs de nature.',
            'district' => 'Morges',
            'img' => 'https://static.mycity.travel/manage/uploads/6/51/46561/4b6b424c4239f31890eeeea4e56ed2baee0aa43f_2000.jpg',
            'departure' => '6.49321, 46.50923',
            'arrival' => '6.51341, 46.52954',
            'distance' => '4',
            'duration' => '120',
            'level_difficulty' => 'Facile',
            'season' => json_encode(['Été', 'Automne']),
            'rating' => '4.4',
            'family' => true,
            'mobility' => true,
            'scroller' => true,
            'bench' => true,
            'wc' => true,
            'type_id' => 2,
            'location_id' => 3
        ]);

        Run::create([
            'name' => 'Sentier des Caves Ouvertes Vaudoises dans Lavaux',
            'descr' => 'Le Sentier des Caves Ouvertes dans Lavaux traverse les célèbres vignobles en terrasses, offrant des vues spectaculaires sur le lac Léman et la possibilité de déguster des vins locaux dans les caves ouvertes le long du chemin.',
            'district' => 'Lavaux',
            'img' => 'https://static.mycity.travel/manage/uploads/6/13/92635/1/caves-ouvertes-vaudoises_3000.jpg',
            'departure' => '6.70890, 46.48621',
            'arrival' => '6.74811, 46.50943',
            'distance' => '6',
            'duration' => '180',
            'level_difficulty' => 'Modéré',
            'season' => json_encode(['Été', 'Automne']),
            'rating' => '4.9',
            'family' => true,
            'mobility' => false,
            'scroller' => false,
            'bench' => true,
            'wc' => true,
            'type_id' => 1,
            'location_id' => 4
        ]);
        Run::create([
            'name' => 'Tour du Mont Tendre',
            'descr' => 'Le Tour du Mont Tendre offre une randonnée panoramique dans le Jura vaudois. À partir du Col du Mollendruz, le sentier grimpe jusqu\'au sommet du Mont Tendre, le point culminant du Jura suisse, offrant une vue à 360 degrés sur les Alpes et le Plateau suisse.',
            'district' => 'Jura-Nord vaudois',
            'img' => 'https://static.mycity.travel/manage/uploads/6/26/46235/99abd175213762bd8ac26fff07a3f46dabb1a6c2_2000.jpg',
            'departure' => '6.341840, 46.619327',
            'arrival' => '6.341840, 46.619327',
            'distance' => '14',
            'duration' => '300',
            'level_difficulty' => 'Modéré',
            'season' => json_encode(['Printemps', 'Été', 'Automne']),
            'rating' => '4.5',
            'family' => false,
            'mobility' => false,
            'scroller' => false,
            'bench' => false,
            'wc' => false,
            'type_id' => 1,
            'location_id' => 1
        ]);
        Run::create([
            'name' => 'Sentier des Toblerones',
            'descr' => 'Le Sentier des Toblerones suit la ligne de défense éponyme, construite pendant la Seconde Guerre mondiale. De Gland à Bassins, ce sentier historique traverse forêts et prairies, offrant un aperçu unique de l\'histoire militaire suisse.',
            'district' => 'Nyon',
            'img' => 'https://static.mycity.travel/manage/uploads/6/25/203324/1/2009-ben-becker-nyontourisme-0876_2000.jpg',
            'departure' => '6.266171, 46.421092',
            'arrival' => '6.215522, 46.455312',
            'distance' => '15',
            'duration' => '240',
            'level_difficulty' => 'Facile',
            'season' => json_encode(['Printemps', 'Été', 'Automne']),
            'rating' => '4.4',
            'family' => true,
            'mobility' => false,
            'scroller' => false,
            'bench' => true,
            'wc' => false,
            'type_id' => 2,
            'location_id' => 2
        ]);
        Run::create([
            'name' => 'Chemin des Crêtes du Jura',
            'descr' => 'Le Chemin des Crêtes du Jura est un itinéraire de longue distance qui traverse les montagnes du Jura de Dielsdorf à Nyon. La section vaudoise offre des vues spectaculaires sur le lac Léman et les Alpes, avec des étapes variées à travers forêts et pâturages.',
            'district' => 'Vaud',
            'img' => 'https://media.myswitzerland.com/image/fetch/c_lfill,g_auto,w_3200,h_1800/f_auto,q_80,fl_keep_iptc/https://www.myswitzerland.com/-/media/dam/resources/routes/j/u/jura%20crest%20trail/images%20all%20season/38716_32001800.jpeg',
            'departure' => '6.215987, 46.382536',
            'arrival' => '6.239745, 46.388828',
            'distance' => '48',
            'duration' => '1440',
            'level_difficulty' => 'Difficile',
            'season' => json_encode(['Printemps', 'Été', 'Automne']),
            'rating' => '4.7',
            'family' => false,
            'mobility' => false,
            'scroller' => false,
            'bench' => true,
            'wc' => false,
            'type_id' => 3,
            'location_id' => 3
        ]);
        Run::create([
            'name' => 'Tour des Dents du Midi',
            'descr' => 'Le Tour des Dents du Midi est une boucle alpine autour du massif des Dents du Midi, dans les Alpes vaudoises. Ce parcours exigeant offre des panoramas exceptionnels sur les montagnes et les vallées environnantes.',
            'district' => 'Monthey',
            'img' => 'https://www.novo-monde.com/Images/articles/dents-du-midi/tour-dents-du-midi-facebook.jpg',
            'departure' => '6.977416, 46.223496',
            'arrival' => '6.977416, 46.223496',
            'distance' => '42',
            'duration' => '1800',
            'level_difficulty' => 'Difficile',
            'season' => json_encode(['Été', 'Automne']),
            'rating' => '4.8',
            'family' => false,
            'mobility' => false,
            'scroller' => false,
            'bench' => false,
            'wc' => false,
            'type_id' => 4,
            'location_id' => 4
        ]);
        Run::create([
            'name' => 'Tour du Grand Muveran',
            'descr' => 'Le Tour du Grand Muveran est une randonnée en boucle qui entoure le massif du Grand Muveran. Le parcours offre une grande variété de paysages alpins, des prairies verdoyantes aux sommets escarpés, avec des vues imprenables tout au long du chemin.',
            'district' => 'Aigle',
            'img' => 'https://elevation.alpsinsight.com/wp-content/uploads/2020/09/Grand_Muveran_trail_running-1.jpg',
            'departure' => '7.135833, 46.226946',
            'arrival' => '7.135833, 46.226946',
            'distance' => '45',
            'duration' => '1800',
            'level_difficulty' => 'Difficile',
            'season' => json_encode(['Été', 'Automne']),
            'rating' => '4.7',
            'family' => false,
            'mobility' => false,
            'scroller' => false,
            'bench' => false,
            'wc' => false,
            'type_id' => 4,
            'location_id' => 5
        ]);
        Run::create([
            'name' => 'Sentier de la Dent de Vaulion',
            'descr' => 'Le Sentier de la Dent de Vaulion est une ascension courte mais raide qui mène au sommet de la Dent de Vaulion. Depuis le sommet, les randonneurs peuvent profiter d\'une vue panoramique sur le lac de Joux et les Alpes.',
            'district' => 'Jura-Nord vaudois',
            'img' => 'https://static.mycity.travel/manage/uploads/6/26/60909/1/randonnee_2000.JPEG',
            'departure' => '6.325663, 46.668587',
            'arrival' => '6.325663, 46.668587',
            'distance' => '4',
            'duration' => '120',
            'level_difficulty' => 'Modéré',
            'season' => json_encode(['Printemps', 'Été', 'Automne']),
            'rating' => '4.6',
            'family' => true,
            'mobility' => false,
            'scroller' => false,
            'bench' => true,
            'wc' => false,
            'type_id' => 2,
            'location_id' => 6
        ]);
        Run::create([
            'name' => 'Chemin du Vignoble',
            'descr' => 'Le Chemin du Vignoble traverse les célèbres vignobles en terrasses de Lavaux, de Rolle à Vevey. Cette randonnée combine la beauté des paysages viticoles et des vues spectaculaires sur le lac Léman.',
            'district' => 'Lavaux-Oron',
            'img' => 'https://upload.wikimedia.org/wikipedia/commons/d/da/Lavaux_Switzerland.jpg',
            'departure' => '6.339358, 46.458302',
            'arrival' => '6.840199, 46.461291',
            'distance' => '29',
            'duration' => '600',
            'level_difficulty' => 'Modéré',
            'season' => json_encode(['Printemps', 'Été', 'Automne']),
            'rating' => '4.8',
            'family' => true,
            'mobility' => false,
            'scroller' => false,
            'bench' => true,
            'wc' => true,
            'type_id' => 3,
            'location_id' => 7
        ]);
    }
}

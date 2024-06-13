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
            'district' => 'Riviera-Pays-d_Enhaut',
            'img' => 'https://fribourg.ch/wp-content/uploads/2021/11/paccots-63727-lespaccots-niremont-automne2017cpascalgertschen-6_3000-2560x1707.jpg',
            'departure' => '46.54536901189999, 6.9803737564819315',
            'arrival' => '46.549296392514314, 6.956738328727477',
            'distance' => '6.5',
            'duration' => '120',
            'level_difficulty' => 'Facile',
            'season' => json_encode(['Printemps', 'Été', 'Automne']),
            'rating' => '4.5',
            'family' => true,
            'school' => true,
            'senior' => true,
            'handicap' => true,
            'dogs' => true,
            'bench' => true,
            'type_id' => 2,
            'location_id' => 1
        ]);


        Run::create([
            'name' => 'Circuit du Teysachaux',
            'descr' => 'Le Circuit du Teysachaux est une randonnée exigeante qui mène au sommet du Teysachaux, offrant des vues spectaculaires sur les Alpes fribourgeoises et le lac Léman. La randonnée commence aux Rosalys et traverse des crêtes rocheuses avant d\'atteindre le sommet. Le parcours descend ensuite vers Le Moléson et Plan-Francey.',
            'district' => 'Riviera-Pays-d_Enhaut',
            'img' => 'https://fribourg.ch/wp-content/uploads/2021/11/DSCF0054_s.jpg',
            'departure' => '46.514830107628114, 6.964773820720802',
            'arrival' => '46.53539928404117, 6.996172071340061',
            'distance' => '12',
            'duration' => '450',
            'level_difficulty' => 'Difficile',
            'season' => json_encode(['Été']),
            'rating' => '4.7',
            'wc' => true,
            'type_id' => 3,
            'location_id' => 2
        ]);
        

        Run::create([
            'name' => 'Chemin des narcisses',
            'descr' => 'Cette promenade thématique devrait être entreprise au printemps (mai à juin). C’est à ce moment-là que les narcisses fleurissant à l’état sauvage transforment les prairies des hauts de Vevey et Montreux en une mer de fleurs blanches. On dirait qu’il a neigé. C’est pourquoi les habitants surnomment ce rare spectacle naturel «neige de mai». Il attire chaque année de nombreux visiteurs au Lac Léman. Un sentier didactique consacré aux narcisses commence aux Avants. Ce village aux allures de Belle Epoque est l’une des plus anciennes stations de sports d’hiver de Suisse. Le sentier est jalonné de panneaux explicatifs, pour permettre aux randonneurs de mieux comprendre la géologie, la faune et la flore de ces lieux.',
            'district' => 'Riviera-Pays-d_Enhaut',
            'img' => 'https://awwway.ch/wp-content/uploads/2017/06/Pleiades_sentier_narcisses_Montreux_7.jpg',
            'departure' => '46.45412470675033, 6.943366962868958',
            'arrival' => '46.48350921614171, 6.909156828516252',
            'distance' => '2',
            'duration' => '60',
            'level_difficulty' => 'Facile',
            'season' => json_encode(['Printemps', 'Été']),
            'rating' => '4.6',
            'family' => true,
            'school' => true,
            'senior' => true,
            'handicap' => true,
            'dogs' => true,
            'parkings' => true,
            'public_transport' => true,
            'mobility' => true,
            'scroller' => true,
            'bench' => true,
            'wc' => true,
            'type_id' => 1,
            'location_id' => 4
        ]);

        Run::create([
            'name' => 'Sentier de la Cité',
            'descr' => 'La promenade de la ville de Lausanne, autour de la cathédrale, offre une immersion historique à travers ses ruelles pavées et son architecture gothique. Depuis la terrasse panoramique, les visiteurs profitent d\'une vue splendide sur le lac Léman et les Alpes, alliant culture et paysages magnifiques. La cathédrale est accessible à pied depuis la gare de Lausanne en environ 20 minutes. Il existe également plusieurs lignes de bus et de métro qui desservent le centre-ville de Lausanne, facilitant l\'accès à la cathédrale.',
            'district' => 'Lausanne',
            'img' => 'https://www.holidify.com/images/cmsuploads/compressed/Kathedrale_Lausanne_20190116135515.jpg',
            'departure' => '48.14783213937967, 7.575284241634811',
            'arrival' => '48.14783213937967, 7.575284241634811',
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
            'location_id' => 1
        ]);
        Run::create([
            'name' => 'Sentier du Flon',
            'descr' => 'Le Sentier du Flon traverse le cœur de Lausanne, en passant par le quartier animé du Flon, autrefois une zone de stockage réhabilitée en un espace de vie moderne avec restaurants, bars, clubs, et boutiques. Le sentier offre également des vues panoramiques sur la ville et les montagnes du Jura.',
            'district' => 'Ouest Lausanne',
            'img' => 'https://www.transpiree.com/files/2016/05/LausanneLeFlonEpalinges_24.jpeg',
            'departure' => '46.55260058005557, 6.657773141554695',
            'arrival' => '46.55260058005557, 6.657773141554695',
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
            'departure' => '46.532572392656675, 6.647113097902176',
            'arrival' => '46.532572392656675, 6.647113097902176',
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
            'departure' => '46.52091321856264, 6.630965885036972',
            'arrival' => '46.52091321856264, 6.630965885036972',
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
            'district' => 'Riviera-Pays-d_Enhaut',
            'img' => 'https://randodze.ch/wp-content/uploads/2020/09/IMG_0151-scaled.jpg',
            'departure' => '46.54951117647702, 7.19448484458471',
            'arrival' => '46.52856836816029, 7.203593867281101',
            'distance' => '5',
            'duration' => '150',
            'level_difficulty' => 'Difficile',
            'season' => json_encode(['Été', 'Printemps']),
            'rating' => '4.7',
            'bench' => true,
            'type_id' => 1,
            'location_id' => 2
        ]);
        
        Run::create([
            'name' => 'Sentier de la Truite à Morges',
            'descr' => 'Le Sentier de la Truite à Morges suit la rivière La Morges, offrant une balade paisible à travers des paysages naturels avec la possibilité d’observer des truites dans leur habitat. Le parcours est idéal pour les familles et les amateurs de nature.',
            'district' => 'Morges',
            'img' => 'https://static.mycity.travel/manage/uploads/6/51/46561/4b6b424c4239f31890eeeea4e56ed2baee0aa43f_2000.jpg',
            'departure' => '46.50757506937341, 6.49747391534524',
            'arrival' => '46.481288017280654, 6.4608474934053435',
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
            'district' => 'Lavaux-Oron',
            'img' => 'https://static.mycity.travel/manage/uploads/6/13/92635/1/caves-ouvertes-vaudoises_3000.jpg',
            'departure' => '46.51275598158506, 6.683177391132113',
            'arrival' => '46.49318639892528, 6.730415527410514',
            'distance' => '6',
            'duration' => '180',
            'level_difficulty' => 'Moyen',
            'season' => json_encode(['Été', 'Automne']),
            'rating' => '4.9',
            'family' => true,
            'bench' => true,
            'wc' => true,
            'type_id' => 1,
            'location_id' => 4
        ]);
        Run::create([
            'name' => 'Tour du Mont Tendre',
            'descr' => 'Le Tour du Mont Tendre offre une randonnée panoramique dans le Jura vaudois. À partir du Col du Mollendruz, le sentier grimpe jusqu\'au sommet du Mont Tendre, le point culminant du Jura suisse, offrant une vue à 360 degrés sur les Alpes et le Plateau suisse.',
            'district' => 'Morges',
            'img' => 'https://static.mycity.travel/manage/uploads/6/26/46235/99abd175213762bd8ac26fff07a3f46dabb1a6c2_2000.jpg',
            'departure' => '46.65171473684825, 6.365114336980808',
            'arrival' => '46.596029541955396, 6.309765408769411',
            'distance' => '14',
            'duration' => '300',
            'level_difficulty' => 'Moyen',
            'season' => json_encode(['Printemps', 'Été', 'Automne']),
            'rating' => '4.5',
            'type_id' => 1,
            'location_id' => 1
        ]);
        Run::create([
            'name' => 'Sentier des Toblerones',
            'descr' => 'Le Sentier des Toblerones suit la ligne de défense éponyme, construite pendant la Seconde Guerre mondiale. De Gland à Bassins, ce sentier historique traverse forêts et prairies, offrant un aperçu unique de l\'histoire militaire suisse.',
            'district' => 'Nyon',
            'img' => 'https://static.mycity.travel/manage/uploads/6/25/203324/1/2009-ben-becker-nyontourisme-0876_2000.jpg',
            'departure' => '46.46227614017204, 6.231397497368685',
            'arrival' => '46.39429166075556, 6.2518121378385425',
            'distance' => '15',
            'duration' => '240',
            'level_difficulty' => 'Facile',
            'season' => json_encode(['Printemps', 'Été', 'Automne']),
            'rating' => '4.4',
            'family' => true,
            'bench' => true,
            'type_id' => 2,
            'location_id' => 2
        ]);
        Run::create([
            'name' => 'Tour des Dents du Midi',
            'descr' => 'Le Tour des Dents du Midi est une boucle alpine autour du massif des Dents du Midi, dans les Alpes vaudoises. Ce parcours exigeant offre des panoramas exceptionnels sur les montagnes et les vallées environnantes.',
            'district' => 'Riviera-Pays-d_Enhaut',
            'img' => 'https://www.dentsdumidi.ch/fichiers/dents-du-midi-reflets-1920x640.jpg',
            'departure' => '46.150944221649674, 6.866171555025891',
            'arrival' => '46.16222022201478, 6.922797735423741',
            'distance' => '42',
            'duration' => '1800',
            'level_difficulty' => 'Difficile',
            'season' => json_encode(['Été', 'Automne']),
            'rating' => '4.8',
            'type_id' => 4,
            'location_id' => 4
        ]);
        Run::create([
            'name' => 'Tour du Grand Muveran',
            'descr' => 'Le Tour du Grand Muveran est une randonnée en boucle qui entoure le massif du Grand Muveran. Le parcours offre une grande variété de paysages alpins, des prairies verdoyantes aux sommets escarpés, avec des vues imprenables tout au long du chemin.',
            'district' => 'Aigle',
            'img' => 'https://elevation.alpsinsight.com/wp-content/uploads/2020/09/Grand_Muveran_trail_running-1.jpg',
            'departure' => '46.28089784766149, 7.212187770786159',
            'arrival' => '46.24671910578271, 7.12773037135524',
            'distance' => '54',
            'duration' => '1800',
            'level_difficulty' => 'Difficile',
            'season' => json_encode(['Été', 'Automne']),
            'rating' => '4.7',
            'type_id' => 4,
            'location_id' => 2
        ]);
        Run::create([
            'name' => 'Sentier de la Dent de Vaulion',
            'descr' => 'Le Sentier de la Dent de Vaulion est une ascension courte mais raide qui mène au sommet de la Dent de Vaulion. Depuis le sommet, les randonneurs peuvent profiter d\'une vue panoramique sur le lac de Joux et les Alpes.',
            'district' => 'Jura-Nord vaudois',
            'img' => 'https://static.mycity.travel/manage/uploads/6/26/60909/1/randonnee_2000.JPEG',
            'departure' => '46.649661361126974, 6.320202657214137',
            'arrival' => '46.68923879781857, 6.3626559477414935',
            'distance' => '4',
            'duration' => '120',
            'level_difficulty' => 'Moyen',
            'season' => json_encode(['Printemps', 'Été', 'Automne']),
            'rating' => '4.6',
            'family' => true,
            'bench' => true,
            'type_id' => 2,
            'location_id' => 4
        ]);
        Run::create([
            'name' => 'Route du vignoble de La Côte',
            'descr' => 'Le Route du vignoble de La Côte traverse les célèbres vignobles en terrasses de Lavaux, de Rolle à Vevey. Cette randonnée combine la beauté des paysages viticoles et des vues spectaculaires sur le lac Léman.',
            'district' => 'Lavaux-Oron',
            'img' => 'https://upload.wikimedia.org/wikipedia/commons/d/da/Lavaux_Switzerland.jpg',
            'departure' => '46.3849985496953, 6.233673963307305',
            'arrival' => '46.51179033478922, 6.4932259713145175',
            'distance' => '29',
            'duration' => '600',
            'level_difficulty' => 'Moyen',
            'season' => json_encode(['Printemps', 'Été', 'Automne']),
            'rating' => '4.8',
            'family' => true,
            'bench' => true,
            'wc' => true,
            'type_id' => 3,
            'location_id' => 2
        ]);


        Run::create([
            'name' => 'Sentier historique du Vully',
            'descr' => 'Le Sentier historique du Vully offre une randonnée enrichissante à travers des paysages viticoles et historiques. Il permet de découvrir des panoramas spectaculaires sur la région des Trois-Lacs, le Jura et les Alpes. Ce sentier traverse également les vignobles du Vully, la seule AOC bicantonale de Suisse.',
            'district' => 'Broye-Vully',
            'img' => 'https://fribourg.ch/wp-content/uploads/2021/11/uft-76888-4-img-0052-web-1920x1080_3000.jpg',
            'departure' => '46.96180135280331, 7.076085262289516', 
            'arrival' => '46.96209424312472, 7.113335781957218',  
            'distance' => '3.5',
            'duration' => '57',
            'level_difficulty' => 'Facile',
            'season' => json_encode(['Printemps', 'Été', 'Automne']),
            'rating' => '4.7',
            'family' => true,
            'bench' => true,
            'type_id' => 3,
            'location_id' => 1
        ]);

        Run::create([
            'name' => 'Randonnée Chasseron',
            'descr' => 'Cette randonnée offre une vue panoramique sur les Alpes et le Jura depuis le sommet du Chasseron.',
            'district' => 'Jura-Nord vaudois',
            'img' => 'https://static.mycity.travel/manage/uploads/6/27/131477/1/ylbr-le-chasseron-paysage-c-vincent-bourrut-www-vincentbourrut-ch-3_2000.jpg',
            'departure' => '46.85178793343932, 6.538213803718356',
            'arrival' => '46.82956528256462, 6.53956059816904',
            'distance' => '8.2',
            'duration' => '56',
            'level_difficulty' => 'Facile',
            'season' => json_encode(['Printemps', 'Été', 'Automne']),
            'rating' => '4.7',
            'family' => true,
            'school' => true,
            'dogs' => true,
            'parkings' => true,
            'public_transport' => true,
            'bench' => true,
            'wc' => true,
            'type_id' => 1,
            'location_id' => 1
        ]);
        
        Run::create([
            'name' => 'Randonnée Lac de Joux',
            'descr' => 'Promenade autour du lac de Joux, offrant des vues splendides sur les montagnes environnantes.',
            'district' => 'Jura-Nord vaudois',
            'img' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/12/af/79/f5/vue-aerienne-de-l-abbaye.jpg?w=600&h=400&s=1',
            'departure' => '46.6530905992821, 6.320345333672695',
            'arrival' => '46.606645350904834, 6.232798029384552',
            'distance' => '14.2',
            'duration' => '300',
            'level_difficulty' => 'Facile',
            'season' => json_encode(['Printemps', 'Été', 'Automne', 'Hiver']),
            'rating' => '4.5',
            'family' => true,
            'school' => true,
            'senior' => true,
            'handicap' => true,
            'dogs' => true,
            'parkings' => true,
            'public_transport' => true,
            'mobility' => true,
            'bench' => true,
            'wc' => true,
            'type_id' => 1,
            'location_id' => 2
        ]);
        
        Run::create([
            'name' => 'Randonnée Rochers-de-Naye',
            'descr' => 'Randonnée offrant une vue imprenable sur le lac Léman et les Alpes depuis les Rochers-de-Naye.',
            'district' => 'Riviera-Pays-d_Enhaut',
            'img' => 'https://ventsetvoyages.fr/wp-content/uploads/2020/09/suise-vaud-rochers-naye.jpg',
            'departure' => '46.43424918323259, 6.947561424956804',
            'arrival' => '46.43247455371999, 6.976572198338563',
            'distance' => '5.6',
            'duration' => '150',
            'level_difficulty' => 'Difficile',
            'season' => json_encode(['Été', 'Automne']),
            'rating' => '4.8',
            'dogs' => true,
            'parkings' => true,
            'public_transport' => true,
            'bench' => true,
            'wc' => true,
            'type_id' => 1,
            'location_id' => 3
        ]); 

    }
}

<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;


class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create([
            'name' => 'Cathédrale de Lausanne',
            'lat' => '46.52257799060757',
            'log' => '6.635368623895602',
            'descr' => 'La Cathédrale de Lausanne, dédiée à Notre-Dame, est un édifice gothique construit entre 1170 et 1240. C\'est l\'un des plus beaux exemples d\'architecture gothique en Suisse. La cathédrale domine la ville de Lausanne et offre une vue imprenable sur le lac Léman et les Alpes.',
            'img' => 'https://www.holidify.com/images/cmsuploads/compressed/Kathedrale_Lausanne_20190116135515.jpg',
            'access' => 'La cathédrale est accessible à pied depuis la gare de Lausanne en environ 20 minutes. Il existe également plusieurs lignes de bus et de métro qui desservent le centre-ville de Lausanne, facilitant l\'accès à la cathédrale.',
            'city' => 'Lausanne',
            'address' => 'Pl. de la Cathédrale 1, 1005 Lausanne',
            'phone' => '+412 38 58 17',
            'availability' => 'Lun - Dim 9h - 19h',
        ]);
        Location::create([
            'name' => 'Rolex Learning Center',
            'lat' => '46.5184109795195',
            'log' => '6.568464807357941',
            'descr' => 'Le Rolex Learning Center est un bâtiment innovant situé sur le campus de l\'École polytechnique fédérale de Lausanne (EPFL). Conçu par les architectes japonais SANAA, il sert de bibliothèque, de centre culturel et de lieu de rencontre pour les étudiants et les chercheurs. Le bâtiment, ouvert en 2010, est célèbre pour son architecture unique et ses espaces ouverts.',
            'img' => 'https://bg-21.com/wp-content/uploads/2022/04/RolexLearningCenter_1_1920%C3%97700.png',
            'access' => 'Le Rolex Learning Center est facilement accessible par les transports publics. Il se trouve à quelques minutes à pied de la station de métro EPFL (ligne M1). Il y a également plusieurs lignes de bus qui desservent le campus.',
            'city' => 'Ecublens'
        ]);
        Location::create([
            'name' => 'Château de Blonay',
            'lat' => '46.46974',
            'log' => '6.89014',
            'descr' => 'Le château de Blonay a appartenu à la famille de Blonay depuis l\'époque féodale, sauf de 1752 à 1806. La seigneurie s\'étendait sur Blonay et St-Légier-La Chiésaz, et la famille de Blonay, remontant au seigneur Othon vers l\'an 1000, est l\'une des plus anciennes et importantes du Pays de Vaud.',
            'img' => 'https://ch.pinterest.com/pin/724657396284017412/',
            'access' => 'Le château de Blonay est accessible à pied depuis la gare de Blonay en environ 8 minutes.',
            'city' => 'Blonay',
            'address' => 'Château de Blonay, 1807 Blonay',

        ]);
        Location::create([
            'name' => 'Château de Prangins',
            'lat' => '46.394824457452266',
            'log' => '6.251651207925503',
            'descr' => "Le Château de Prangins est une majestueuse demeure historique située près du lac Léman. Construit au XVIIIe siècle, ce château élégant est entouré de magnifiques jardins à la française et offre une vue imprenable sur le lac et les Alpes. Aujourd'hui, il abrite une partie du Musée national suisse, présentant des expositions permanentes et temporaires qui plongent les visiteurs dans l'histoire et la culture suisses. Le château est également célèbre pour son potager historique, cultivé selon des méthodes anciennes, et pour ses événements culturels variés qui attirent les visiteurs tout au long de l'année",
            'img' => 'https://www.chateaudeprangins.ch/chateaudeprangins/allgemeiner-bilddownload/6018/image-thumb__6018__image_content/museenational-hires0007.jpg',
            'access' => "Le Château de Prangins est accessible en voiture avec un parking gratuit près de l'autoroute A1 et en train depuis la gare de Nyon  suivi d'un bus direct. Plusieurs lignes desservant des arrêts proches",
            'city' => 'Prangins',
            'address' => 'Av. Général Guiguer 3, 1197 Prangins',
            'phone' => '+4122 994 88 90',
            'availability' => 'Mar - Dim 10h - 17h',
        ]);
        Location::create([
            'name' => 'Terrasses viticoles de Lavaux',
            'lat' => '46.48843449182406',
            'log' => '6.730312002642406',
            'descr' => "Lavaux est une région viticole du canton de Vaud (Suisse), connue pour ses vignobles en terrasses au bord du Léman. Le 28 juin 2007, Lavaux entre au classement du patrimoine mondial de l'humanité de l'UNESCO1.",
            'img' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/da/Lavaux_Switzerland.jpg/1920px-Lavaux_Switzerland.jpg',
            'access' => 'Départ de la gare de Lutry direction St-Saphorin, il faut suivre le tracé « Suisse randonnée » ou « Suisse à pied 113 ».',
            'city' => 'Cully',
            'address' => 'Rue du Temple 17, 1096 Cully',
            'phone' => '021 946 15 74',
        ]);
        Location::create([
            'name' => 'Esprit Frappeur',
            'lat' => '46.50369',
            'log' => '6.68276',
            'descr' => 'Concerts, interprétations improvisées et spectacles comiques proposés dans un espace chaleureux avec bar et petite scène.',
            'img' => 'https://www.fusions.ch/sightseeing/2011/10/24/DSC_0001.jpg',
            'access' => 'Aucune entrée accessible en fauteuil roulant',
            'city' => 'Lutry',
            'address' => 'Villa Mégroz, Av. du Grand-Pont 20, 1095 Lutry',
            'phone' => '+412 21 793 12 01',
            'availability' => 'Je - Sam 19h - 00h',
        ]);
        Location::create([
            'name' => 'Tour de Sauvabelin',
            'lat' => '46.53550906457262',
            'log' => '6.638315822500245',
            'descr' => 'La Tour de Sauvabelin est une tour en bois de 35 mètres de haut située dans la forêt du même nom, à Lausanne. Offrant une vue panoramique sur la ville et le lac Léman, elle est un lieu prisé des promeneurs et des amateurs de nature.',
            'img' => 'https://static.lausanne-tourisme.ch/image/upload/f_auto,w_2500/hqywlzoultwmwrsttvdt',
            'access' => 'La Tour de Sauvabelin est accessible à pied depuis le centre de Lausanne en environ 30 minutes. Il est également possible de s\'y rendre en voiture et de se garer à proximité.',
            'city' => 'Lausanne',
            'address' => 'Forêt de Sauvabelin, 1000 Lausanne',
            'phone' => '+41 21 315 25 55',
            'availability' => 'Ouvert tous les jours, heures variables en fonction de la saison.',
        ]);
        Location::create([
            'name' => 'Musée olympique',
            'lat' => '46.50890958819071',
            'log' => '6.634023524353118',
            'descr' => 'Le Musée olympique est un musée consacré à l\'histoire des Jeux Olympiques modernes et du Comité International Olympique. Situé à Lausanne, il propose des expositions interactives et éducatives sur le mouvement olympique.',
            'img' => 'https://static.lausanne-tourisme.ch/image/upload/f_auto,w_2500/ebsc4upk95dxnfwtr4el',
            'access' => 'Le Musée olympique est accessible en métro depuis le centre de Lausanne, station "Ouchy-Olympique". Des bus desservent également la zone.',
            'city' => 'Lausanne',
            'address' => 'Quai d\'Ouchy 1, 1006 Lausanne',
            'phone' => '+41 21 621 65 11',
            'availability' => 'Ouvert du mardi au dimanche, horaires variables.',
        ]);
        Location::create([
            'name' => 'Glacier 3000',
            'lat' => '46.35407687210021',
            'log' => '7.205826758744264',
            'descr' => 'Le Glacier 3000 est un glacier accessible par téléphérique depuis le col du Pillon, près de Gstaad. Il offre des vues spectaculaires sur les Alpes suisses et propose diverses activités comme la luge d\'été et le pont suspendu Peak Walk.',
            'img' => 'https://images.contenthub.dev/g8e1xze8wimq/19a08bfa2fd5b273a9a35eff190b0213/Berge-Glacier3000-Luftaufnahme-H%C3%A4ngebr%C3%BCcke.jpg',
            'access' => 'Le Glacier 3000 est accessible en voiture depuis Gstaad ou en transports publics jusqu\'au col du Pillon, suivi d\'un court trajet en téléphérique.',
            'city' => 'Les Diablerets',
            'address' => 'Col du Pillon, 1865 Les Diablerets',
            'phone' => '+41 24 492 39 00',
            'availability' => 'Ouvert toute l\'année, mais les activités varient selon la saison.',
        ]);
        Location::create([
            'name' => 'Musée Charlie Chaplin',
            'lat' => '46.47565899376484',
            'log' => '6.851501470387171',
            'descr' => 'Le Musée Charlie Chaplin est dédié à la vie et à l\'œuvre du célèbre acteur et réalisateur. Il est situé dans sa dernière demeure, à Corsier-sur-Vevey, offrant une expérience immersive à travers des artefacts, des films et des expositions interactives.',
            'img' => 'https://www.architectes.ch/media/image/3/normal_16_9/8ebae324c108e1d0ab3425d377c4c667.jpg',
            'access' => 'Le musée est accessible en voiture depuis Vevey ou Lausanne, ainsi qu\'en train jusqu\'à la gare de Corsier-sur-Vevey, suivie d\'une courte marche.',
            'city' => 'Corsier-sur-Vevey',
            'address' => 'Rue de la Tour-de-Peilz 2, 1804 Corsier-sur-Vevey',
            'phone' => '+41 21 804 32 10',
            'availability' => 'Ouvert du mardi au dimanche, horaires variables.',
        ]);
    }
}

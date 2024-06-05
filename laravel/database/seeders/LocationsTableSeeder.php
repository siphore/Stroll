<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'lat' => '46.522896',
            'log' => '6.635988',
            'descr' => 'La Cathédrale de Lausanne, dédiée à Notre-Dame, est un édifice gothique construit entre 1170 et 1240. C\'est l\'un des plus beaux exemples d\'architecture gothique en Suisse. La cathédrale domine la ville de Lausanne et offre une vue imprenable sur le lac Léman et les Alpes.',
            'img' => 'https://www.holidify.com/places/lausanne/cathdrale-de-notre-dame-sightseeing-10801.html', // Replace this URL with the actual image URL you want to use.
            'acess' => 'La cathédrale est accessible à pied depuis la gare de Lausanne en environ 20 minutes. Il existe également plusieurs lignes de bus et de métro qui desservent le centre-ville de Lausanne, facilitant l\'accès à la cathédrale.'
        ]);
        Location::create([
            'name' => 'Rolex Learning Center',
            'lat' => '46.518605',
            'log' => '6.565850',
            'descr' => 'Le Rolex Learning Center est un bâtiment innovant situé sur le campus de l\'École polytechnique fédérale de Lausanne (EPFL). Conçu par les architectes japonais SANAA, il sert de bibliothèque, de centre culturel et de lieu de rencontre pour les étudiants et les chercheurs. Le bâtiment, ouvert en 2010, est célèbre pour son architecture unique et ses espaces ouverts.',
            'img' => 'https://www.pinterest.ca/pin/rolex-learning-centre-epfl-lausanne-sanaa-iwan-baan--163114817750314597/', // Replace this URL with the actual image URL you want to use.
            'acess' => 'Le Rolex Learning Center est facilement accessible par les transports publics. Il se trouve à quelques minutes à pied de la station de métro EPFL (ligne M1). Il y a également plusieurs lignes de bus qui desservent le campus.'

        ]);
    }
}

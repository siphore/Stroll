<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->delete();
        $genres = ['Street Art', 'Architecture', 'Historique', 'Nature', 'Sportif', 'Gastronomie', 'Arts & Culture', 'Ephémère'];
        $descr = ["Sentiers Street Art", "Sentiers d'architecture", "Sentiers historiques", "Sentiers Nature", "Sentiers sportifs", "Sentiers gastronomiques", "Sentiers Art & Culture", "Sentiers éphémères"];

        foreach ($genres as $index => $genre) {
            DB::table('types')->insert([
                'name' => $genre,
                'descr' => $descr[$index]
            ]);
        }
    }
}

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
        $genres = ['Street Art', 'Architecture', 'Historique', 'Nature', 'Sportif', 'Gastronomie & Vins', 'Arts & Culture', 'Ephémère'];
        foreach ($genres as $genre) {
            DB::table('types')->insert(['name' => $genre]);
        }
    }
}

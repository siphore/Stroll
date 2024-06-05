<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstname' => 'Stroll',
            'lastname' => 'Admin',
            'email' => 'stroll.admin@gmx.ch',
            'password' => 'Strolltest',
            'isAdmin' => true
        ]);
        User::create([
            'firstname' => 'Michaël',
            'lastname' => 'Cheneval',
            'email' => 'michael.cheneval@gmx.ch',
            'password' => 'Strolltest',
            'isAdmin' => false
        ]);
        User::create([
            'firstname' => 'Helder',
            'lastname' => 'Varela',
            'email' => 'helder.varela@gmx.ch',
            'password' => 'Strolltest',
            'isAdmin' => false
        ]);
    }
}

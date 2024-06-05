<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\User;
use App\Models\Location;
use App\Models\Run;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(TypeTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(RunsTableSeeder::class);


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

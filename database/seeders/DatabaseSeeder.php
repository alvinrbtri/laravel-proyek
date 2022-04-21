<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Materi;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
                'name' => 'Admin Sayu',
                'username' => 'adminsayu',
                'email' => 'adminsayu@gmail.com',
                'password' => bcrypt('password')
            ]);

        User::factory(3)->create();

        Kategori::create([
            'name' => 'Theory Scouts',
            'slug' => 'theory-scouts'
        ]);

        Kategori::create([
            'name' => 'Basic Knowledge of Scouting',
            'slug' => 'basic-knowledge-of-scouting'
        ]);

        Kategori::create([
            'name' => 'Scout Guide',
            'slug' => 'scout-guide'
        ]);

        Kategori::create([
            'name' => 'Scouting-Practise',
            'slug' => 'scouting-practise'
        ]);

        Kategori::create([
            'name' => 'Camp',
            'slug' => 'camp'
        ]);

        Materi::factory(20) -> create();

    }
}



<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = ['Mistery', 'Crime', 'Science', 'Fantasy', 'Horror', 'Romance', 'Adventure'];
        
        foreach ($genres as $genre) {
            $newGenre = new Genre();

            $newGenre->name = $genre;

            $newGenre->save();
        }

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->insert([
            ['name' => 'Umberto Eco', 'birthday' => '1932-01-05', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Italo Calvino', 'birthday' => '1923-10-15', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Alessandro Manzoni', 'birthday' => '1785-03-07', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('categories')->insert([
            ['name' => 'Romanzo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Saggio', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Storico', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('books')->insert([
            [
                'title' => 'Il nome della rosa',
                'description' => 'Un romanzo storico e giallo ambientato in un monastero medievale.',
                'pages' => 512,
                'author_id' => 1, // Umberto Eco
                'category_id' => 1, // Romanzo
                'created_at' => now(),
                'updated_at' => now(),
                'image' => 'img/no-cover.webp',
            ],
            [
                'title' => 'Le città invisibili',
                'description' => 'Un libro immaginativo e poetico che esplora città fantastiche.',
                'pages' => 165,
                'author_id' => 2, // Italo Calvino
                'category_id' => 2, // Saggio
                'created_at' => now(),
                'updated_at' => now(),
                'image' => 'img/no-cover.webp',
            ],
            [
                'title' => 'I Promessi Sposi',
                'description' => 'Il più celebre romanzo storico italiano del XIX secolo.',
                'pages' => 720,
                'author_id' => 3, // Alessandro Manzoni
                'category_id' => 3, // Storico
                'created_at' => now(),
                'updated_at' => now(),
                'image' => 'img/no-cover.webp',
            ],
        ]);
    }
}

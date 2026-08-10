<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $authors = Author::factory(10)->create();

        foreach ($authors as $author) {
            Book::factory(3)->create([
                'author_id' => $author->id,
            ]);
        }
    }
}
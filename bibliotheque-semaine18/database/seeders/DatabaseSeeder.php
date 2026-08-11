<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();

        $authors = Author::factory(10)->create();

        foreach ($authors as $author) {
            Book::factory(3)->create([
                'author_id' => $author->id,
            ]);
        }

        $this->call([
            LoanSeeder::class,
        ]);
    }
}
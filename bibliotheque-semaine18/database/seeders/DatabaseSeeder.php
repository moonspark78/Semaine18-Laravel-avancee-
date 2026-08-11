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
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);

        $staff = User::factory()->create([
            'name' => 'Staff',
            'email' => 'staff@example.com',
        ]);

        $authors = Author::factory(10)->create();

        foreach ($authors as $author) {
            Book::factory(3)->create([
                'author_id' => $author->id,
            ]);
        }

        $this->call([
            RoleSeeder::class,
            LoanSeeder::class,
        ]);

        $admin->update([
            'role_id' => 1,
        ]);

        $staff->update([
            'role_id' => 2,
        ]);
    }
}
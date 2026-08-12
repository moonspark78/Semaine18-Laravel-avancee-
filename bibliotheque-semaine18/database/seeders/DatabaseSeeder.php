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
        $this->call([
            RoleSeeder::class,
        ]);

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);

        $admin->assignRole('admin');

        $staff = User::factory()->create([
            'name' => 'Staff',
            'email' => 'staff@example.com',
        ]);

        $staff->assignRole('staff');

        $user = User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
        ]);

        $user->assignRole('user');

        $authors = Author::factory(10)->create();

        foreach ($authors as $author) {
            Book::factory(3)->create([
                'author_id' => $author->id,
                'created_by' => $staff->id,
            ]);
        }

        $this->call([
            LoanSeeder::class,
        ]);
    }
}
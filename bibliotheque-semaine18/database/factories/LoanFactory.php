<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'book_id' => Book::inRandomOrder()->first()->id,
            'borrowed_at' => fake()->dateTimeBetween('-1 month', 'now'),
            'returned_at' => fake()->optional()->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
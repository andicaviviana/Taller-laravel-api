<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'book_name' => fake()->sentence(3),
            'book_author_name' => fake()->name(),
            'book_price' => fake()->numberBetween(20000, 100000),
            'book_stock' => fake()->numberBetween(1, 50),
            'book_status' => fake()->boolean(),
        ];
    }
}

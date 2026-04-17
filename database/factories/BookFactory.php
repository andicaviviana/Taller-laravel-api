<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'book_name' => $this->faker->sentence(3),
            'book_author_name' => $this->faker->name(),
            'book_price' => $this->faker->numberBetween(10000, 80000),
            'book_stock' => $this->faker->numberBetween(1, 50),
            'book_status' => $this->faker->boolean(),

            'category_id' => Category::inRandomOrder()->first()->id,

            'barcode' => strtoupper($this->faker->bothify('??###??###')),
        ];
    }
}

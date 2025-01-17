<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(10.0, 1000.0),
            'discount' => $this->faker->randomFloat(10.0, 500.0),
            'quantity' => $this->faker->numberBetween(1, 10),
            'image' => $this->faker->imageUrl(),
            'color' => $this->faker->colorName(),
            'rating' => $this->faker->numberBetween(1, 5),
            'size' => $this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL']),
        ];
    }
}

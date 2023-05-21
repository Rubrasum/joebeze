<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tailwindBorderColors = array(
            'red-200',
            'yellow-200',
            'green-200',
            'blue-200',
            'indigo-200',
            'purple-200',
            'pink-200',
            'red-500',
            'yellow-500',
            'green-500',
            'blue-500',
            'indigo-500',
            'purple-500',
            'pink-500'
        );

        return [
            'name' => $this->faker->unique()->word(),
            'slug' => $this->faker->unique()->slug(),
            'color' => $this->faker->unique()->randomElement($tailwindBorderColors)
        ];
    }
}

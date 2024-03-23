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
        // TODO Update this so that categories can share colors
        $tailwindBorderColors = array(
            'red-100', 'red-200', 'red-300',
            'orange-100', 'orange-200', 'orange-300',
            'amber-100', 'amber-200', 'amber-300',
            'yellow-100', 'yellow-200', 'yellow-300',
            'lime-100', 'lime-200', 'lime-300',
            'green-100', 'green-200', 'green-300',
            'emerald-100', 'emerald-200', 'emerald-300',
            'teal-100', 'teal-200', 'teal-300',
            'cyan-100', 'cyan-200', 'cyan-300',
            'blue-100', 'blue-200', 'blue-300',
            'indigo-100', 'indigo-200', 'indigo-300',
            'violet-100', 'violet-200', 'violet-300',
            'purple-100', 'purple-200', 'purple-300',
            'fuchsia-100', 'fuchsia-200', 'fuchsia-300',
            'pink-100', 'pink-200', 'pink-300',
            'rose-100', 'rose-200', 'rose-300'
        );

        return [
            'name' => $this->faker->unique()->word(),
            'slug' => $this->faker->unique()->slug(),
            'color' => $this->faker->unique()->randomElement($tailwindBorderColors)
        ];
    }
}

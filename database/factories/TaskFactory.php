<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            '"SELECT _ FROM tables"',
            '"SELECT * ____ FROM tables"',
            '"SELECT * FROM _____"',
            '"SELECT * FROM _____ WHERE __ = ___"',
            '"SELECT * FROM _____ WHERE ___ = _____ AND ____ = _____"',
            '"SELECT * FROM _____ WHERE ____ = _____ AND ___ = ___ OR _____ = _______"',
            '"SELECT * FROM _____ WHERE _____ = ___ AND _____ = _____ OR ___ = ___ AND ____ = ___"',
        ];

        return [
            'assignment_title' => fake()->word(),
            'assignment' => fake()->randomElement($data),
            'category_id' => fake()->numberBetween(1,10),
            'description' => fake()->sentences(5, true),
            'answer' => fake()->words(4, true),
        ];
    }
}

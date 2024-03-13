<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake() -> sentence,
            'description' => fake() -> paragraph,
            'long_description' => fake() -> paragraph(7, true),
            'completed' => fake() -> boolean
        ];
    }
}

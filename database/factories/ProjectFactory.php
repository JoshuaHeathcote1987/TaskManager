<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3), // Generate a random project name
            'description' => $this->faker->paragraph(), // Generate a random description
            'status' => $this->faker->randomElement(['Active', 'Completed', 'Archived']), // Random status
            'start_date' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random start date within the past year
            'end_date' => $this->faker->optional()->dateTimeBetween('now', '+1 year'), // Random end date or NULL
            'owner_id' => \App\Models\User::factory(), // Generate a new user as the owner
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

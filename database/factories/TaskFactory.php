<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
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
        return [
            'title' => $this->faker->sentence(5), // Random task title
            'description' => $this->faker->optional()->paragraph(), // Random description or NULL
            'status' => $this->faker->randomElement(['To-Do', 'In Progress', 'Completed']),
            'priority' => $this->faker->randomElement(['High', 'Medium', 'Low']),
            'due_date' => $this->faker->optional()->dateTimeBetween('now', '+1 year'),
            'project_id' => \App\Models\Project::factory(),
            'assigned_user_id' => $this->faker->optional()->randomElement(\App\Models\User::pluck('id')->toArray()), // Nullable user ID
            'created_at' => now(),
            'updated_at' => now(),
        ];             
    }
}

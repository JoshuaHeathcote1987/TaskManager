<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Risk>
 */
class RiskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6), // Random risk title
            'description' => $this->faker->optional()->paragraph(), // Nullable description
            'impact' => $this->faker->randomElement(['Low', 'Medium', 'High']), // Random impact level
            'probability' => $this->faker->randomElement(['Low', 'Medium', 'High']), // Random probability level
            'status' => $this->faker->randomElement(['Identified', 'Mitigating', 'Resolved', 'Closed']), // Random status
            'project_id' => $this->faker->optional()->randomElement(\App\Models\Project::pluck('project_id')->toArray()), // Nullable project_id
            'task_id' => $this->faker->optional()->randomElement(\App\Models\Task::pluck('task_id')->toArray()), // Nullable task_id
            'reported_by' => \App\Models\User::factory(), // Factory for the user who reported the risk
            'created_at' => now(),
            'updated_at' => now(),
        ];       
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Issue>
 */
class IssueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6), // Random issue title
            'description' => $this->faker->optional()->paragraph(), // Nullable description
            'status' => $this->faker->randomElement(['Open', 'In Progress', 'Resolved', 'Closed']), // Random status
            'priority' => $this->faker->randomElement(['Low', 'Medium', 'High', 'Critical']), // Random priority
            'project_id' => $this->faker->optional()->randomElement(\App\Models\Project::pluck('project_id')->toArray()), // Nullable foreign key (project_id)
            'task_id' => $this->faker->optional()->randomElement(\App\Models\Task::pluck('task_id')->toArray()), // Nullable foreign key (task_id)
            'reported_by' => \App\Models\User::factory(), // Factory for reported_by user
            'created_at' => now(),
            'updated_at' => now(),
        ];        
    }
}

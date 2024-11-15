<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->paragraph(), // Random comment content
            'task_id' => \App\Models\Task::factory(), // Generate a new task as the task ID
            'user_id' => \App\Models\User::factory(), // Generate a new user as the user ID
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

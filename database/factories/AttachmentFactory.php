<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attachment>
 */
class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'file_path' => $this->faker->filePath(), // Random file path
            'task_id' => \App\Models\Task::factory(), // Generate a new task as the task ID
            'uploaded_by' => $this->faker->optional()->randomElement(\App\Models\User::pluck('id')->toArray()), // Generate a new user as the uploader (or NULL)
            'created_at' => now(),
            'updated_at' => now(),
        ];        
    }
}


<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Timesheet>
 */
class TimesheetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'task_id' => \App\Models\Task::factory(), // Generate a new task as the task ID
            'user_id' => \App\Models\User::factory(), // Generate a new user as the user ID
            'hours_logged' => $this->faker->randomFloat(2, 1, 8), // Random hours logged between 1.00 and 8.00
            'log_date' => $this->faker->date(), // Random date for the timesheet entry
            'description' => $this->faker->optional()->paragraph(), // Random description or NULL
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

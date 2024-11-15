<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meeting>
 */
class MeetingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3), // Random meeting title
            'description' => $this->faker->optional()->paragraph(), // Random description or NULL
            'scheduled_at' => $this->faker->dateTimeBetween('now', '+1 year'), // Random meeting date and time in the future
            'duration' => $this->faker->numberBetween(30, 180), // Random duration between 30 and 180 minutes
            'project_id' => $this->faker->optional()->randomElement(\App\Models\Project::pluck('project_id')->toArray()), // Generate a new project as the project ID (or NULL)
            'created_by' => \App\Models\User::factory(), // Generate a new user as the creator
            'created_at' => now(),
            'updated_at' => now(),
        ];        
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('secret'),
            'role' => 'Admin',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Project Manager',
            'email' => 'project_manager@example.com',
            'password' => bcrypt('secret'),
            'role' => 'Project Manager',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Team Member',
            'email' => 'team_member@example.com',
            'password' => bcrypt('secret'),
            'role' => 'Team Member',
        ]);

        \App\Models\User::factory(10)->create();
        \App\Models\Project::factory(5)->create();
        \App\Models\Task::factory(10)->create();
        \App\Models\Comment::factory(10)->create();
        \App\Models\Attachment::factory(10)->create();
        \App\Models\Meeting::factory(10)->create();
        \App\Models\Timesheet::factory(10)->create();
        \App\Models\Issue::factory(10)->create();
        \App\Models\Risk::factory(10)->create();
    }
}

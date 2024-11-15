<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id('issue_id'); // Primary Key
            $table->string('title'); // Issue title
            $table->text('description')->nullable(); // Issue description
            $table->enum('status', ['Open', 'In Progress', 'Resolved', 'Closed'])->default('Open'); // Status of the issue
            $table->enum('priority', ['Low', 'Medium', 'High', 'Critical'])->default('Medium'); // Priority level
            $table->unsignedBigInteger('project_id')->nullable(); // Foreign Key referencing Projects table
            $table->unsignedBigInteger('task_id')->nullable(); // Foreign Key referencing Tasks table
            $table->unsignedBigInteger('reported_by'); // Foreign Key referencing Users table
            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // For soft deleting issues

            // Foreign Key Constraints
            $table->foreign('project_id')->references('project_id')->on('projects')->onDelete('set null');
            $table->foreign('task_id')->references('task_id')->on('tasks')->onDelete('set null');
            $table->foreign('reported_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};

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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('task_id'); // Primary Key
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('status', ['To-Do', 'In Progress', 'Completed'])->default('To-Do');
            $table->enum('priority', ['High', 'Medium', 'Low'])->default('Medium');
            $table->date('due_date')->nullable();
            $table->unsignedBigInteger('project_id'); // Foreign Key referencing Projects table
            $table->unsignedBigInteger('assigned_user_id')->nullable(); // Make nullable to allow NULL when user is deleted
            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // For soft deleting tasks
        
            // Foreign Key Constraints
            $table->foreign('project_id')->references('project_id')->on('projects')->onDelete('cascade');
            $table->foreign('assigned_user_id')->references('id')->on('users')->onDelete('set null');
        });     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

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
        Schema::create('timesheets', function (Blueprint $table) {
            $table->id('timesheet_id'); // Primary Key
            $table->unsignedBigInteger('task_id'); // Foreign Key referencing Tasks table
            $table->unsignedBigInteger('user_id'); // Foreign Key referencing Users table
            $table->decimal('hours_logged', 5, 2); // Hours logged, max 999.99 hours
            $table->date('log_date'); // Date of log
            $table->text('description')->nullable(); // Description of the work done
            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // For soft deleting timesheet entries

            // Foreign Key Constraints
            $table->foreign('task_id')->references('task_id')->on('tasks')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timesheets');
    }
};

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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id('meeting_id'); // Primary Key
            $table->string('title'); // Meeting title
            $table->text('description')->nullable(); // Meeting description
            $table->dateTime('scheduled_at'); // Date and time of the meeting
            $table->integer('duration')->comment('Duration in minutes'); // Duration in minutes
            $table->unsignedBigInteger('project_id')->nullable(); // Foreign Key referencing Projects table
            $table->unsignedBigInteger('created_by'); // Foreign Key referencing Users table
            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // For soft deleting meetings

            // Foreign Key Constraints
            $table->foreign('project_id')->references('project_id')->on('projects')->onDelete('set null');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};

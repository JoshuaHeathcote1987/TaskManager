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
        Schema::create('comments', function (Blueprint $table) {
            $table->id('comment_id'); // Primary Key
            $table->text('content'); // Comment content
            $table->unsignedBigInteger('task_id'); // Foreign Key referencing Tasks table
            $table->unsignedBigInteger('user_id'); // Foreign Key referencing Users table
            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // For soft deleting comments

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
        Schema::dropIfExists('comments');
    }
};

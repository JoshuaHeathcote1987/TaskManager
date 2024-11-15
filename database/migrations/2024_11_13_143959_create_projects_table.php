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
        Schema::create('projects', function (Blueprint $table) {
            $table->id('project_id'); // Primary Key
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('status', ['Active', 'Completed', 'Archived'])->default('Active');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->unsignedBigInteger('owner_id')->nullable();  // Foreign Key referencing Users table
            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // For soft deleting projects

            // Foreign Key Constraints
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

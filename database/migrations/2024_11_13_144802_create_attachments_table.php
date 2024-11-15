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
        Schema::create('attachments', function (Blueprint $table) {
            $table->id('attachment_id'); // Primary Key
            $table->string('file_path'); // Path to the file or link
            $table->unsignedBigInteger('task_id'); // Foreign Key referencing Tasks table
            $table->unsignedBigInteger('uploaded_by')->nullable(); // Make nullable to allow NULL when user is deleted
            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // For soft deleting attachments
        
            // Foreign Key Constraints
            $table->foreign('task_id')->references('task_id')->on('tasks')->onDelete('cascade');
            $table->foreign('uploaded_by')->references('id')->on('users')->onDelete('set null');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachments');
    }
};

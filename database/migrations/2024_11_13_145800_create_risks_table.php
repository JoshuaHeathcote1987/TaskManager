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
        Schema::create('risks', function (Blueprint $table) {
            $table->id('risk_id');
            $table->string('title');
            $table->text('description')->nullable();  // Make description nullable
            $table->enum('impact', ['Low', 'Medium', 'High'])->default('Medium');
            $table->enum('probability', ['Low', 'Medium', 'High'])->default('Medium');
            $table->enum('status', ['Identified', 'Mitigating', 'Resolved', 'Closed'])->default('Identified');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('task_id')->nullable();
            $table->unsignedBigInteger('reported_by');
            $table->timestamps();
            $table->softDeletes();
        
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
        Schema::dropIfExists('risks');
    }
};

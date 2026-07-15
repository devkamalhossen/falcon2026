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
            $table->id();
            $table->integer('created_by')->nullable();
            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('set null');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('motto')->nullable();
            $table->integer('status')->comment('1 = upcoming, 2 = ongoing, 3 = completed');
            $table->string('image')->nullable();
            $table->string('video_id')->nullable();
            $table->string('video')->nullable();
            $table->string('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
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

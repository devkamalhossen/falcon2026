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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->integer('created_by')->nullable();
            $table->foreignId('team_type_id')->constrained('team_types')->onDelete('set null');
            $table->string('name');
            $table->string('designation');
            $table->text('bio');
            $table->string('educational_bg')->nullable();
            $table->string('image');
            $table->boolean('is_director')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};

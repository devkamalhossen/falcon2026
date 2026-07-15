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
        Schema::create('company_files', function (Blueprint $table) {
            $table->id();
            $table->integer('created_by')->nullable();
            $table->integer('type')->comment('1 = Profile, 2 =  Brochure, 3 = Job Preference');
            $table->string('title');
            $table->string('image');
            $table->string('file');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_files');
    }
};

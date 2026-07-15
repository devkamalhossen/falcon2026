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
        Schema::create('importers', function (Blueprint $table) {
            $table->id();
            $table->integer('created_by')->nullable();
            $table->integer('type')->comment('1 = importer, 2 = distributor 3 = applicator');
            $table->string('name')->nullable();
            $table->string('image');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('importers');
    }
};

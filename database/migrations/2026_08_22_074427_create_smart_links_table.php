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
        Schema::create('smart_links', function (Blueprint $table) {
    $table->id();

    // The music release this smart link belongs to
    $table->foreignId('music_id')
        ->unique()
        ->constrained('music')
        ->cascadeOnDelete();

    // Public URL identifier
    $table->string('slug')->unique();

    // Optional custom title/subtitle for the smart-link page
    $table->string('headline')->nullable();
    $table->text('description')->nullable();

    // Enable / disable the smart-link page
    $table->boolean('is_active')->default(true);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smart_links');
    }
};

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
        Schema::create('videos', function (Blueprint $table) {
    $table->id();

    $table->string('title');

    // YouTube video ID, e.g. dQw4w9WgXcQ
    $table->string('youtube_id');

    // Optional relationship to a music release
    $table->foreignId('music_id')
        ->nullable()
        ->constrained('music')
        ->nullOnDelete();

    $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};

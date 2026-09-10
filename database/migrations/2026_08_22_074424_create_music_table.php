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
        Schema::create('music', function (Blueprint $table) {
           $table->id();
           $table->string('title');
           $table->string('type')->nullable();
           $table->string('artist');
           $table->string('image')->nullable();
           $table->year('year')->nullable();
           $table->string('spotify_link')->nullable();
           $table->string('apple_link')->nullable();
           $table->string('audiomack_link')->nullable();
           $table->string('amazon_link')->nullable();
           $table->string('youtudemusic_link')->nullable();
           $table->string('boomplay_link')->nullable();
           $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('music');
    }
};

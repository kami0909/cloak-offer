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
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('path')->unique();
            $table->json('included_countries')->nullable(true);
            $table->json('excluded_countries')->nullable(true);
            $table->string('target_url');
            $table->string('redirect_url');
            $table->foreignId('offer_id')->constrained('offers');
            $table->foreignId('source_id')->constrained('sources');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_pages');
    }
};

<?php

use App\Models\EventCategory;
use App\Models\Judge;
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
        Schema::create('event_items', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('number')->nullable();
            $table->string('flag')->nullable();
            $table->string('name')->nullable();
            $table->string('country')->nullable();
            $table->string('category')->nullable();
            $table->string('score')->nullable();

            $table->json('params_sport')->nullable();
            $table->json('params_score')->nullable();
            $table->json('params_judge')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_items');
    }
};

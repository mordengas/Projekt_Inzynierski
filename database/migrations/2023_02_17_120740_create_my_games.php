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
        Schema::create('my_games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('crating');
            $table->string('cratingc');
            $table->string('rating');
            $table->string('ratingc');
            $table->string('game_modes');
            $table->string('genres');
            $table->string('platforms');
            $table->timestamp('release_date');
            $table->string('cover');
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_games');
    }
};

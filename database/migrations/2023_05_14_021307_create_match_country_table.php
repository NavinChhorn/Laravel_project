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
        Schema::create('match_country', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("match_id");
            $table->foreign("match_id")
            ->references("id")
            ->on("matches")
            ->onDelete('cascade');
            $table->unsignedBigInteger("country_id");
            $table->foreign("country_id")
            ->references("id")
            ->on("countries")
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_country');
    }
};

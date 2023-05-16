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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("zone_id");
            $table->foreign("zone_id")
            ->references("id")
            ->on("zones")
            ->onDelete('cascade');
            // $table->unsignedBigInteger("event_id");
            // $table->foreign("event_id")
            // ->references("id")
            // ->on("events");
            $table->unsignedBigInteger("match_country_id");
            $table->foreign("match_country_id")
            ->references("id")
            ->on("match_countries")
            ->onDelete('cascade');
            $table->boolean('booking')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};

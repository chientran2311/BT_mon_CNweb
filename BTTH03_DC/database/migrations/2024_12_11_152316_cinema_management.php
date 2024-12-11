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
        Schema::create("cinemas", function (Blueprint $table) {
            $table->id("cinemaid");
            $table->string("name");
            $table->string("location");
            $table->integer("total_seats");
        });

        Schema::create("movies", function (Blueprint $table) {
                $table->id("movieid");
                $table->string("title");
                $table->string("director");
                $table->timestamp("release_date");
                $table->integer("duration");
                $table->unsignedBigInteger("cinemaid");
                $table->foreign("cinemaid")->references("cinemaid")->on("cinemas")->onDelete("cascade");
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("cinemas");
    }
};

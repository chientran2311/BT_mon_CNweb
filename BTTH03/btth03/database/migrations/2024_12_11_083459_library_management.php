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
        Schema::create("libraries", function (Blueprint $table) {
            $table->id("libraryid");
            $table->string("name");
            $table->string("address");
            $table->string("contact_number");
        });

        Schema::create("books", function (Blueprint $table) {
            $table->id("bookid");
            $table->string("title");
            $table->string("author");
            $table->timestamp("publication_year");
            $table->string("genre");
            $table->unsignedBigInteger("libraryid");
            $table->foreign("libraryid")->references("libraryid")->on("libraries")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("libraries");
        Schema::dropIfExists("books");
    }
};

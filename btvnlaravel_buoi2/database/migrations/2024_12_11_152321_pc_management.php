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
            Schema::create("renters", function (Blueprint $table) {
                $table->id("renterid");
                $table->string("name");
                $table->string("phone_number");
                $table->string("email");
            });


            Schema::create("laptops", function (Blueprint $table) {
                $table->id("laptopid");
                $table->string("brand");
                $table->string("model");
                $table->string("specifications");
                $table->boolean("rental_status");
                $table->unsignedBigInteger("renterid");
                $table->foreign("renterid")->references("renterid")->on("renters")->onDelete("cascade");
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("renters");
        Schema::dropIfExists("laptops");
    }
};

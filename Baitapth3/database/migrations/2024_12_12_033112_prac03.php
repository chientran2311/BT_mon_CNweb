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
        Schema::create("computers", function (Blueprint $table) {
            $table->id("computer_id");
            $table->string("computer_name");
            $table->string("model");
            $table->string("operating_system");
            $table->string("processor");
            $table->integer("memory");
            $table->boolean("available");
        });

        Schema::create("issues", function (Blueprint $table) {
            $table->id("issues_id");
            $table->unsignedBigInteger("computer_id");
            $table->foreign("computer_id")
            ->references("computer_id")->on("computers")
            ->onDelete("cascade");
            $table->string("reported_by");
            $table->dateTime("reported_date");
            $table->string("description");
            $table->string("urgency");
            $table->string("status");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists("issues");
    }
};

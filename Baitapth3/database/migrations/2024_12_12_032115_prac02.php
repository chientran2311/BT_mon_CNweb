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
        Schema::create("classes", function (Blueprint $table) {
            $table->id("class_id");
            $table->string("grade_level");
            $table->string("room_number");
        });

        Schema::create("students", function (Blueprint $table) {
            $table->id("students_id");
            $table->string("first_name");
            $table->string("last_name");
            $table->date("date_of_birth");
            $table->string("parent_phone");
            $table->unsignedBigInteger("class_id");
            $table->foreign("class_id")
            ->references("class_id")->on("classes")
            ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("classes");
        Schema::dropIfExists("students");
    }
};
 /**
     * Reverse the migrations.....
     */

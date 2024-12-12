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
        Schema::create("medicines", function (Blueprint $table) {
            $table->id("medicine_id");
            $table->string("name");
            $table->string("brand");
            $table->string("dosage");
            $table->string("form");
            $table->decimal("price");
            $table->integer("stock");
        });

        Schema::create("sales", function (Blueprint $table) {
            $table->id("sales_id");
            $table->unsignedBigInteger("medicine_id");
            $table->foreign("medicine_id")
            ->references("medicine_id")->on("medicines")
            ->onDelete("cascade");
            $table->integer("quantity");
            $table->dateTime("sale_date");
            $table->string("customer_phone");
        });
    }

    /**
     * Reverse the migrations....
     */
    public function down(): void
    {
        Schema::dropIfExists("medicines");
        Schema::dropIfExists("sales");
    }
};
 /**
     * Reverse the migrations......
     */

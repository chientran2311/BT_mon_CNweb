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
        Schema::create("it_centers", function (Blueprint $table) {
            $table->id("it_centersid");
            $table->string("name");
            $table->string("location");
            $table->string("contact_email");
        });

        Schema::create("hardware_devices", function (Blueprint $table) {
            $table->id("hardware_devicesid");
            $table->string("device_name");
            $table->string("type");
            $table->boolean("status");
            $table->unsignedBigInteger("it_centersid");
            $table->foreign("it_centersid")->references("it_centersid")->on("it_centers")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("it_centers");
        Scope::dropIfExists("hardware_devices");
    }
};

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
        Schema::create('helpers', function (Blueprint $table) {
            $table->id("registrationID");
            $table->unsignedBigInteger("work_area_id");
            $table->longText("notes")->nullable();

            $table->foreign("work_area_id")->references("id")->on("work_areas");
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('helpers');
    }
};

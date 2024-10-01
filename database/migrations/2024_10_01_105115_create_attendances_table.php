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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("helper_id");
            $table->unsignedBigInteger("shift_id");
            $table->boolean("startedWorking")->default(0);
            $table->boolean("checkedIn")->default(0);

            $table->foreign("helper_id")->references("registrationID")->on("helpers");
            $table->foreign('shift_id')->references("id")->on("shift_days");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};

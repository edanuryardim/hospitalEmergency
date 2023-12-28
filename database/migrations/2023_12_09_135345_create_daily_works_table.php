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
    { Schema::create('daily_works', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('doctor_id')->nullable();
        $table->unsignedBigInteger('nurse1_id')->nullable();
        $table->unsignedBigInteger('nurse2_id')->nullable();
        $table->unsignedBigInteger('nurse3_id')->nullable();
        $table->date('date')->nullable();;
        $table->integer('patient_count')->default(0);
        $table->timestamps();

        $table->foreign('doctor_id')->references('id')->on('doctors');
        $table->foreign('nurse1_id')->references('id')->on('nurses');
        $table->foreign('nurse2_id')->references('id')->on('nurses');
        $table->foreign('nurse3_id')->references('id')->on('nurses');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_works');
    }
};

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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->string('surname', 100)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('gender', 100)->nullable();
            $table->string('id_number', 100)->nullable();
            $table->dateTime('entry_date')->nullable();
            $table->dateTime('exit_date')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('intervention')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->unsignedBigInteger('nurse_id')->nullable();
            $table->unsignedBigInteger('room_id')->nullable();
            $table->unsignedBigInteger('bed_id')->nullable();
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('bed_id')->references('id')->on('beds');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('nurse_id')->references('id')->on('nurses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};

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
        Schema::create('witnesses', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('nim', 9);
            $table->string('name', 100);
            $table->uuid('study_program_id');
            $table->uuid('grade_id');
            $table->string('year', 4);
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();

            $table->index('study_program_id')->references('id')->on('study_programs')->onDelete('cascade');
            $table->index('grade_id')->references('id')->on('grades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('witnesses');
    }
};

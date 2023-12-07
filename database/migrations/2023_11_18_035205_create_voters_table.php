<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('nim', 9);
            $table->string('name', 100);
            $table->uuid('study_program_id');
            $table->uuid('grade_id');
            $table->string('year', 4);
            $table->string('email')->unique();
            $table->enum('status', ['AKTIF', 'NON-AKTIF']);
            $table->enum('election_status', ['Sudah Memilih', 'Belum Memilih']);
            $table->string('password');
            $table->timestamps();

            $table->index('study_program_id')->references('id')->on('study_programs')->onDelete('cascade');
            $table->index('grade_id')->references('id')->on('grades')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('voters');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('voter_id')->nullable();
            $table->uuid('candidate_id')->nullable();
            $table->timestamps();

            $table->index('voter_id')->references('id')->on('voters')->onDelete("cascade");
            $table->index('candidate_id')->references('id')->on('candidates')->onDelete("cascade");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};

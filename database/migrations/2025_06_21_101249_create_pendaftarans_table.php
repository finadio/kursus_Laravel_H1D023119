<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kursus_id')->constrained()->onDelete('cascade');
            $table->foreignId('peserta_id')->constrained()->onDelete('cascade');
            $table->string('status')->default('pending');
            $table->timestamps();
            
            $table->unique(['kursus_id', 'peserta_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
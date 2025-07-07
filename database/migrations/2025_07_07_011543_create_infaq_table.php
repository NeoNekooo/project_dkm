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
        Schema::create('infaq', function (Blueprint $table) {
            $table->id();
            $table->string('headline');
            $table->text('description');
            $table->text('picture')->nullable();
            $table->string('nomer_rekening')->nullable();
            $table->string('nama_rekening')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infaq');
    }
};

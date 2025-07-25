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
    Schema::create('tentang_kami', function (Blueprint $table) {
    $table->id();
    $table->string('foto_masjid')->nullable();
    $table->text('isi');
    $table->string('nama_ketua');
    $table->string('foto_ketua')->nullable();
    $table->string('sejarah_ketua');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentang_kami');
    }
};

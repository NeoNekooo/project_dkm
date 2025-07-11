<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dkm_profil', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('visi')->nullable();
            $table->unsignedBigInteger('id_tentang')->nullable();
            $table->unsignedBigInteger('id_kontak')->nullable();
            $table->string('logo')->nullable();
            $table->string('background')->nullable();
            $table->timestamps();
            $table->string('luas_tanah')->nullable();
            $table->string('tahun_berdiri')->nullable();
            $table->string('ig')->nullable();
            $table->string('fb')->nullable();
            $table->string('wa')->nullable();
            $table->string('yt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dkm_profil');
    }
};

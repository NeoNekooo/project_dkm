<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi');
            $table->string('lokasi');
            $table->date('tanggal')->nullable();
            $table->timestamps();
            $table->boolean('status')->default(true);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};


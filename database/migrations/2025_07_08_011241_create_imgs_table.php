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
        Schema::create('imgs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('tanggal');
            $table->string('tag');
            $table->string('path'); // untuk simpan path file
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imgs');
    }
};

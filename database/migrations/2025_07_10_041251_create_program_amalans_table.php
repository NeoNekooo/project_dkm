<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('program_amalans', function (Blueprint $table) {
            $table->id();
            $table->string('kategori'); // contoh: menu_harian, menu_mingguan, program_muslimah, menu_bulanan
            $table->text('deskripsi'); // isi program
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_amalans');
    }
};

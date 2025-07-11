<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amalans', function (Blueprint $table) {
            $table->id();
            $table->string('kategori'); 
            $table->string('nama_amalan');
            $table->text('deskripsi')->nullable(); 
            $table->string('waktu')->nullable(); 
            $table->integer('urutan')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amalans');
    }
}
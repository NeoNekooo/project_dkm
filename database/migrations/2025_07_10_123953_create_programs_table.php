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
    Schema::create('programs', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('desc');
        $table->string('icon'); // e.g. fa-building
        $table->string('color'); // e.g. bg-yellow-100 text-yellow-700 border-yellow-200
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};

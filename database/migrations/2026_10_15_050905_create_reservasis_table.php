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
    Schema::create('reservasis', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pemesan');
        $table->string('no_hp');
        $table->date('tanggal');
        $table->string('jam_mulai');
        $table->string('jam_selesai');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};

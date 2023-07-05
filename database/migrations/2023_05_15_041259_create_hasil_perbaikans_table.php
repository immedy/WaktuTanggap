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
        Schema::create('hasil_perbaikans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('noregistrasi');
            $table->foreignId('dibuat_oleh');
            $table->string('hasil_perbaikan');
            $table->string('rekomendasi');
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_perbaikans');
    }
};

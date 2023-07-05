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
        Schema::create('kerusakans', function (Blueprint $table) {
            $table->id('notiket');
            $table->foreignId('pegawai_id');
            $table->foreignId('ruangan');
            $table->string('keterangan');
            $table->string('spesifikasi');
            $table->string('alat');
            $table->decimal('jumlah');
            $table->dateTime('waktu_pelaporan');
            $table->dateTime('waktu_respon')->nullable();
            $table->foreignId('diterima_oleh')->nullable();
            $table->string('status',3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerusakans');
    }
};

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
        Schema::create('hasil_surveys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Noregistrasi');
            $table->integer('pekerjaan');
            $table->integer('sebab_rusak');
            $table->integer('kondisialat');
            $table->foreignId('dibuat_oleh');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_surveys');
    }
};

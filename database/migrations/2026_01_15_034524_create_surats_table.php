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
        Schema::create('surats', function (Blueprint $table) {
            $table->id(); // PK
            $table->string('nama_surat');
            $table->unsignedBigInteger('id_jenis_surat');
            $table->string('nomor_surat')->nullable();
            $table->date('tanggal_pengajuan');
            $table->unsignedBigInteger('warga_id');
            $table->string('status_admin')->default('menunggu');
            $table->string('status_rw')->default('menunggu');
            $table->string('status')->default('diproses');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};

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
            $table->string('nomor_surat')->nullable();
            $table->date('tanggal_pengajuan');
            $table->string('status_rw')->nullable();
            $table->string('status_kepala')->nullable();
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('warga_id');
            $table->unsignedBigInteger('jenis_surat_id');
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

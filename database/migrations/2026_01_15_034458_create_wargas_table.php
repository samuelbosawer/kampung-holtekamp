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
        Schema::create('wargas', function (Blueprint $table) {
            $table->id(); // PK
            $table->string('nik')->unique();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->unsignedBigInteger('rt_id');
            $table->unsignedBigInteger('rw_id');
            $table->string('pekerjaan')->nullable();
            $table->string('status'); // contoh: menikah, belum menikah
            $table->unsignedBigInteger('user_id');

            // // FK ke rts
            // $table->foreign('rt_id')
            //     ->references('id')
            //     ->on('rts')
            //     ->onDelete('cascade');

            // // FK ke rw
            // $table->foreign('rw_id')
            //     ->references('id')
            //     ->on('rw')
            //     ->onDelete('cascade');

            // // FK ke users
            // $table->foreign('user_id')
            //     ->references('id')
            //     ->on('users')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wargas');
    }
};

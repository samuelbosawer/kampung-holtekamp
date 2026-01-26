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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // PK
            $table->tinyInteger('q1');
            $table->tinyInteger('q2');
            $table->tinyInteger('q3');
            $table->tinyInteger('q4')->nullable();
            $table->tinyInteger('q5')->nullable();

            $table->string('kategori'); // Pelayanan, Sistem, dll
            $table->string('nilai');    // Sangat Baik, Baik, Cukup, dll

            $table->text('review')->nullable();
            $table->date('tanggal');

            $table->unsignedBigInteger('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

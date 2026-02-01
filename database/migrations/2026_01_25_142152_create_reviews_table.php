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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('tanggal');

            // TABEL 1 – UI/UX
            $table->tinyInteger('q1'); // Tampilan menarik & profesional
            $table->tinyInteger('q2'); // Tata letak rapi
            $table->tinyInteger('q3'); // Warna, ikon, teks mudah dipahami
            $table->tinyInteger('q4'); // Navigasi mudah
            $table->tinyInteger('q5'); // Mudah dipelajari
            $table->tinyInteger('q6'); // Membantu mempercepat pelayanan

            // TABEL 2 – Kepuasan
            $table->tinyInteger('q7');
            $table->tinyInteger('q8');
            $table->tinyInteger('q9');
            $table->tinyInteger('q10');
            $table->tinyInteger('q11');
            $table->tinyInteger('q12');
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

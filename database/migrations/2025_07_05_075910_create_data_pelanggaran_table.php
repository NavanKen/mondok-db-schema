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
        Schema::create('data_pelanggaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('kategori', ['Ringan', 'Sedang', 'Berat', 'Sangat Berat']);
            $table->integer('poin');
            $table->unsignedBigInteger('jenis_pelanggaran_id');
            $table->timestamps();

            $table->foreign('jenis_pelanggaran_id')->references('id')->on('jenis_pelanggaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pelanggaran');
    }
};

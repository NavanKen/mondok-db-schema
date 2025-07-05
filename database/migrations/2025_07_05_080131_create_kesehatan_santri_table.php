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
        Schema::create('kesehatan_santri', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('santri_id');
            $table->date('tgl_diperiksa');
            $table->text('keluhan');
            $table->text('diagnosa')->nullable();
            $table->text('obat')->nullable();
            $table->string('lokasi_rawat')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->text('catatan')->nullable();
            $table->string('status')->default('draft');
            $table->unsignedBigInteger('musyrif_id');
            $table->timestamps();

            $table->foreign('santri_id')->references('id')->on('santri');
            $table->foreign('musyrif_id')->references('id')->on('musyrif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kesehatan_santri');
    }
};

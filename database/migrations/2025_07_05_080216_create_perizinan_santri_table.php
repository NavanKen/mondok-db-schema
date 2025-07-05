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
        Schema::create('perizinan_santri', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('santri_id');
            $table->datetime('tgl_ijin');
            $table->datetime('tgl_kembali');
            $table->string('penjemput');
            $table->text('keperluan');
            $table->text('catatan')->nullable();
            $table->string('status')->default('Draft');
            $table->datetime('waktu_keluar')->nullable();
            $table->datetime('waktu_kembali')->nullable();
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
        Schema::dropIfExists('perizinan_santri');
    }
};

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
        Schema::create('santri', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nis')->unique();
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->unsignedBigInteger('halaqoh_id')->nullable();
            $table->unsignedBigInteger('kamar_id')->nullable();
            $table->unsignedBigInteger('jenjang_id');
            $table->unsignedBigInteger('musyrif_id')->nullable();
            $table->unsignedBigInteger('orang_tua_id');
            $table->timestamps();

            $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->foreign('halaqoh_id')->references('id')->on('halaqoh');
            $table->foreign('kamar_id')->references('id')->on('kamar');
            $table->foreign('jenjang_id')->references('id')->on('jenjang');
            $table->foreign('musyrif_id')->references('id')->on('musyrif');
            $table->foreign('orang_tua_id')->references('id')->on('orang_tua');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santri');
    }
};

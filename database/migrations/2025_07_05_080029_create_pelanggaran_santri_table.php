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
        Schema::create('pelanggaran_santri', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('santri_id');
            $table->unsignedBigInteger('data_pelanggaran_id');
            $table->text('deskripsi')->nullable();
            $table->string('status')->default('draft');
            $table->date('tanggal');
            $table->string('tindakan')->nullable();
            $table->unsignedBigInteger('musyrif_id');
            $table->timestamps();

            $table->foreign('santri_id')->references('id')->on('santri');
            $table->foreign('data_pelanggaran_id')->references('id')->on('data_pelanggaran');
            $table->foreign('musyrif_id')->references('id')->on('musyrif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggaran_santri');
    }
};

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
        Schema::create('profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('username')->nullable();
            $table->string('full_name')->nullable();
            $table->text('description')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('addres')->nullable();
            $table->enum('role', ['admin', 'orang_tua', 'musyrif', 'keamanan'])->default('orang_tua');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};

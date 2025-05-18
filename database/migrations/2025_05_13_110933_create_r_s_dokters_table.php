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
        Schema::create('rs_dokters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rumah_sakit_id')->constrained('rumah_sakits')->cascadeOnDelete();
            $table->foreignId('dokter_id')->constrained('dokters')->cascadeOnDelete();
            $table->string('jadwal_praktek')->nullable();
            $table->timestamps();

            $table->unique(['rumah_sakit_id', 'dokter_id']); // ← Cegah duplikasi kombinasi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rs_dokters');
    }
};

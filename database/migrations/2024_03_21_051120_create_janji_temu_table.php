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
        Schema::create('janji_temu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id');
            $table->foreignId('doctor_id')->nullable();
            $table->foreignId('service_id')->nullable();
            $table->foreignId('recipe_id')->nullable();
            $table->foreign('patient_id')
                ->references('id')
                ->on('patients')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('doctor_id')
                ->references('id')
                ->on('patients')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('recipe_id')
            ->references('id')
            ->on('recipes')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->text('riwayat_pemeriksaan')->nullable();
            $table->text('keluhan');
            $table->enum('status', array('Diterima', 'Menunggu', 'Ditolak'));
            $table->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamp('tgl_temu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('janji_temu');
    }
};

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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->string('ubicación', 255)->nullable();
            $table->string('nivel_gravedad', 45)->nullable();
            $table->string('comentario', 255)->nullable();
            $table->string('foto_reporte', 255)->nullable();
            $table->string('foto_cierre', 255)->nullable();
            $table->foreignId('tipoResiduo_id')->constrained('tipoResiduo');
            $table->foreignId('users_id')->constrained('users');
            $table->foreignId('estatus_id')->constrained('estatus');
            $table->foreignId('centrosReciclaje_id')->nullable()->constrained('centrosReciclaje');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};

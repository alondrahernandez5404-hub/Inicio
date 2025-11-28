<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('desarrolladores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->string('clave_desarrollador');
            $table->string('telefono');
            $table->string('codigo_postal');
            $table->string('pais_ciudad');
            $table->string('contrasena'); // la encriptaremos después
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desarrolladores');
    }
};

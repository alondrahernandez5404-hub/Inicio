<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('peliculas', function (Blueprint $table) {
            // Agrega columnas solo si no existen (evita errores si ya existen)
            if (!Schema::hasColumn('peliculas', 'descripcion')) {
                $table->text('descripcion')->nullable()->after('plataforma');
            }
            if (!Schema::hasColumn('peliculas', 'imagen')) {
                $table->string('imagen')->nullable()->after('descripcion');
            }
        });
    }

    public function down(): void
    {
        Schema::table('peliculas', function (Blueprint $table) {
            if (Schema::hasColumn('peliculas', 'imagen')) {
                $table->dropColumn('imagen');
            }
            if (Schema::hasColumn('peliculas', 'descripcion')) {
                $table->dropColumn('descripcion');
            }
        });
    }
};

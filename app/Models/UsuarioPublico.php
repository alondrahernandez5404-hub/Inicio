<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioPublico extends Model
{
    use HasFactory;

    protected $table = 'usuarios_publicos'; // ← ESTA LÍNEA ES LA CLAVE

    protected $fillable = [
        'nombre',
        'pais',
        'correo',
    ];
}

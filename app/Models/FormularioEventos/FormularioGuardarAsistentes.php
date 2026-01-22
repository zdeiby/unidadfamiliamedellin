<?php

namespace App\Models\FormularioEventos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormularioGuardarAsistentes extends Model
{
    use HasFactory;

    protected $table = 'formularios_registroeventos'; // Nombre exacto de la tabla

    protected $primaryKey = 'documento'; // 🔥 Clave primaria compuesta
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'documento',
        'id_evento',
        'nombre1',
        'nombre2',
        'apellido1',
        'apellido2',
        'cargo',
        'correo',
        'firma',
        'telefono',
        'tipo_documento',
        'empresa',
    ];

    public $timestamps = true; // Para manejar created_at y updated_at automáticamente


}


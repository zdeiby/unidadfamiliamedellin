<?php

namespace App\Models\FormularioVisionarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionariosCertificacionesAdicionales extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos (sin prefijo de base de datos)
    protected $table = 'gep_laravel.visionarios_certificaciones_adicionales';

    // Clave primaria compuesta (documento y periodo)
    protected $primaryKey = ['documento', 'periodo'];
    public $incrementing = false; // No hay autoincremento en la clave primaria

    // Tipo de clave primaria
    protected $keyType = 'string';

    // Deshabilitar timestamps automáticos de Laravel (porque ya están en la BD)
    public $timestamps = false;

    // Definir los campos asignables masivamente
    protected $fillable = [
        'documento',
        'periodo',
        'certificaciones',
        'cuales_certificaciones',
        'disponibilidad_horas',
        'dispositivo',
        'internet',
        'desplazamiento',
        'proyecto_especializacion',
        'motivacion_proyecto',
        'nivel_educativo',
        'estudiando',
        'nombre_colegio',
        'grado_cursado',
        'nombre_universidad',
        'programa_academico',
        'semestre',
        'titulo_pregrado',
        'titulo_posgrado',
        'conocimientos_ti',
        'estudios_ti',
        'created_at',
        'updated_at'
    ];

    // Evita problemas con claves compuestas en consultas avanzadas
    public function getKeyName()
    {
        return ['documento', 'periodo'];
    }
}

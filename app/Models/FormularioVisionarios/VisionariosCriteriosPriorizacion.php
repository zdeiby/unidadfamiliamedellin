<?php

namespace App\Models\FormularioVisionarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionariosCriteriosPriorizacion extends Model
{
    use HasFactory;

    protected $table = 'gep_laravel.visionarios_criterios_priorizacion'; // Nombre de la tabla

    protected $primaryKey = ['periodo', 'documento']; // Claves primarias compuestas
    public $incrementing = false; // Desactiva el auto-incremento
    protected $keyType = 'string'; // Define la clave primaria como string

    protected $fillable = [
        'periodo', 'documento',
        'victima_ruv', 'vbg_violencia', 'madres_prea', 'poblacion_afro',
        'reinsercion', 'pos_penado', 'diversidad_funcional',
        'created_at', 'updated_at'
    ];

    public $timestamps = true; // Habilita created_at y updated_at

    // Método para definir clave primaria compuesta
    protected function setKeysForSaveQuery($query)
    {
        return $query->where('periodo', $this->getAttribute('periodo'))
                     ->where('documento', $this->getAttribute('documento'));
    }

    // Obtener el último registro por documento
    public static function obtenerUltimoRegistroPorDocumento($documento)
    {
        return self::where('documento', $documento)
            ->orderByDesc('periodo')
            ->first();
    }
}

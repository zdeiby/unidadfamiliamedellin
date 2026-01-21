<?php

namespace App\Models\FormularioVisionarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionariosCaracterizacion extends Model
{
    use HasFactory;

    protected $table = 'gep_laravel.visionarios_caracterizacion'; // Nombre de la tabla

    protected $primaryKey = ['periodo', 'documento']; // Claves primarias compuestas
    public $incrementing = false; // Desactiva el auto-incremento
    protected $keyType = 'string'; // Define la clave primaria como string

    protected $fillable = [
        'periodo', 'documento', 'nombre1', 'nombre2', 'apellido1', 'apellido2',
        'tipodocumento', 'telefono', 'celular', 'correo', 'fecha_nacimiento',
        'nombre_tutor', 'habeasdata','como_entero','otro_cual',
        'tipodocumento_tutor','documento_tutor','correo_tutor','telefono_tutor',
        'estado_civil', 'sexo', 'identidad_genero', 'orientacion_sexual',
        'lgbtiq', 'pais_nacimiento', 'departamento_nacimiento', 'municipio_nacimiento',
        'pais_residencia', 'departamento_residencia', 'municipio_residencia',
        'comuna_residencia', 'barrio_residencia', 'dirCampo1', 'dirCampo2', 'dirCampo3',
        'dirCampo4', 'dirCampo5', 'dirCampo6', 'dirCampo7', 'dirCampo8', 'dirCampo9',
        'direccion', 'tiempo_residencia', 'tiene_hijos', 'consume_sustancias',
        'estrato_vivienda', 'puntaje_sisben', 'usuario', 'created_at', 'updated_at'
    ];

    public $timestamps = true; // Habilita created_at y updated_at

    // Método para definir clave primaria compuesta
    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('periodo', '=', $this->getAttribute('periodo'))
            ->where('documento', '=', $this->getAttribute('documento'));
        return $query;
    }

    public static function obtenerUltimoRegistroPorDocumento($documento)
{
    return self::where('documento', $documento)
        ->orderByDesc('periodo')
        ->first();
}

}

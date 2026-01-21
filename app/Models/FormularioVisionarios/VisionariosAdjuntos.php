<?php

namespace App\Models\FormularioVisionarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionariosAdjuntos extends Model
{
    use HasFactory;

    protected $table = 'gep_laravel.visionarios_adjuntos'; // Nombre de la tabla

    protected $primaryKey = ['periodo', 'documento']; // Clave primaria compuesta
    public $incrementing = false; // Desactivar auto-incremento
    protected $keyType = 'string'; // Claves primarias son strings

    protected $fillable = [
        'periodo',
        'documento',
        'url_cedula',
        'url_servicios',
        'url_diploma',
        'usuario',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true; // Habilita created_at y updated_at

    /**
     * Configuración para clave primaria compuesta en Eloquent.
     */
    public function setKeysForSaveQuery($query)
    {
        return $query->where('periodo', $this->getAttribute('periodo'))
                     ->where('documento', $this->getAttribute('documento'));
    }

 

    /**
     * Busca un adjunto por periodo y documento.
     *
     * @param string $periodo
     * @param string $documento
     * @return VisionariosAdjuntos|null
     */
    public static function buscarAdjuntoPorPeriodoYDocumento($periodo, $documento)
    {
        return self::where('periodo', $periodo)
            ->where('documento', $documento)
            ->first();
    }

    /**
     * Crea o actualiza un adjunto con clave primaria compuesta.
     *
     * @param array $datos
     * @return VisionariosAdjuntos
     */
    public static function crearOActualizarAdjunto(array $datos)
    {
        return self::updateOrCreate(
            ['periodo' => $datos['periodo'], 'documento' => $datos['documento']],
            $datos
        );
    }
}

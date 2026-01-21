<?php

namespace App\Models\FormularioVisionarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionariosDistincionesSociales extends Model
{
    use HasFactory;

        // Nombre de la tabla en la base de datos
        protected $table = 'gep_laravel.visionarios_distinciones_sociales';
    
        // Clave primaria compuesta
        protected $primaryKey = ['documento', 'periodo'];
        public $incrementing = false; // Laravel no manejará auto-incremento
    
        // Tipo de clave primaria
        protected $keyType = 'string';
    
        // Deshabilitar timestamps automáticos de Laravel (porque ya los definimos en la BD)
        public $timestamps = false;
    
        // Definir los campos asignables masivamente
        protected $fillable = [
            'documento',
            'periodo',
            'olimpiadas',
            'lider_estudiantil',
            'ediles_jal',
            'consejeros_cccp',
            'planeacion_cccp',
            'consejeros_cdj',
            'venteros_informales',
            'barristas',
            'veteranos',
            'created_at',
            'updated_at'
        ];
    
        // Indicar que la clave primaria es compuesta (para consultas avanzadas)
        public function getKeyName()
        {
            return ['documento', 'periodo'];
        }
    }

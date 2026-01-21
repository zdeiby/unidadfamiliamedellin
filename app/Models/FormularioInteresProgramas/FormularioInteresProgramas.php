<?php 
namespace App\Models\FormularioInteresProgramas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormularioInteresProgramas extends Model
{
    use HasFactory;

    protected $table = 'formulario_interes_programas'; // Nombre correcto de la tabla en la BD

    protected $primaryKey = 'documento'; // Clave primaria ahora es 'documento'
    public $incrementing = false; // Desactiva el auto-incremento
    protected $keyType = 'string'; // Define la clave primaria como string

    protected $fillable = [
        'documento', 'nombre1', 'nombre2', 'apellido1', 'apellido2',
        'tipodocumento', 'correo',  'telefono', 'otra_cual', 'conocia_sapiencia', 'como_se_entero',
        'matricula_cero', 'medellin_virtual', 'estudia', 
        'fondos_sapiencia_pregrado', 'fondos_sapiencia_postgrado',
        'bilinguismo', 'premios_medellin_investiga',
        'created_at', 'updated_at'
    ];
}

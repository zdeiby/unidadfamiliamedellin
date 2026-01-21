<?php 
namespace App\Models\FormularioAutorizacionImagen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormularioAutorizacionImagen extends Model
{
    use HasFactory;

    protected $table = 'formularios_autorizacion_imagen'; // Nombre correcto de la tabla en la BD

    protected $primaryKey = 'documento'; // Clave primaria ahora es 'documento'
    public $incrementing = false; //  Desactiva el auto-incremento
    protected $keyType = 'string'; //  Define la clave primaria como string

    protected $fillable = [
        'documento', 'nombre1', 'nombre2', 'apellido1', 'apellido2',
        'tipodocumento', 'lugar_expedicion', 'nombre_tutor',
        'tipodocumento_tutor', 'documento_tutor', 'lugar_expedicion_tutor',
        'fecha_diligenciamiento', 'correo', 'autorizacion', 'firma', 'como_se_entero',
        'otra_cual'
    ];
}

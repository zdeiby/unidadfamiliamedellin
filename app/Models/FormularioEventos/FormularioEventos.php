<?php
namespace App\Models\FormularioEventos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormularioEventos extends Model
{
    use HasFactory;

    protected $fillable = [
       'documento', 'name', 'start_date', 'start_time', 'end_time', 'manager', 'organizer','qr_token'
    ];


    public function asistentes()
    {
        return $this->hasMany(FormularioGuardarAsistentes::class, 'id_evento', 'id');
    }
}

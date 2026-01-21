<?php

namespace App\Models\ListasGenerales;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ListasGenerales extends Model
{
    protected $table; // Nombre de la tabla (se define dinámicamente)
    protected $primaryKey = 'id'; // ID como clave primaria
    public $timestamps = false; // ❌ No usa created_at ni updated_at

    /**
     * Establecer dinámicamente la tabla
     */
    public function setTableName($nombreTabla)
    {
        $this->table = $nombreTabla;
    }

    /**
     * Obtener todos los registros de una tabla con estado = 1 y devolver como <option>
     */
    public static function obtenerOpciones($nombreTabla, $filtros = [])
    {
        $query = DB::table($nombreTabla)
            ->select('id', 'descripcion')
            ->where('estado', 1); // 📌 Siempre filtra por estado = 1

        // Aplicar filtros adicionales si existen
        if (!empty($filtros)) {
            foreach ($filtros as $campo => $valor) {
                $query->where($campo, $valor);
            }
        }

        $registros = $query->get(); // 🔍 Obtener datos

        // Construir las opciones <option>
        $html = '<option value="">Seleccione una opción</option>'; // Opción inicial
        foreach ($registros as $registro) {
            $html .= '<option value="' . $registro->id . '">' . $registro->descripcion . '</option>';
        }

        return $html; // 🔄 Retorna las opciones en formato HTML
    }

    public static function obtenerMunicipiosPorDepartamento($codigo_departamento)
    {
        $municipios = DB::table('listas_generales.t1_municipio')
            ->select('id', 'nombre')
            ->where('codigo_departamento', $codigo_departamento)
            ->get();

        // Construir las opciones <option>
        $html = '<option value="">Seleccione un Municipio</option>';
        foreach ($municipios as $municipio) {
            $html .= '<option value="' . $municipio->id . '" >' . $municipio->nombre . '</option>';
        }

        return $html;
    }

    public static function obtenerDepartamentos()
    {
        $municipios = DB::table('listas_generales.t1_departamento')
            ->select('id', 'nombre','codigo')
            ->get();

        // Construir las opciones <option>
        $html = '<option value="">Seleccione un Departamento</option>';
        foreach ($municipios as $municipio) {
            $html .= '<option value="' . $municipio->id . '" data-codigo="' . $municipio->codigo . '">' . $municipio->nombre . '</option>';
        }

        return $html;
    }


    public static function obtenerComunasPorMunicipio($codigo_municipio)
    {
        $comunas = DB::table('listas_generales.t1_comuna')
            ->select('codigo', 'comuna')
            ->where('codigo_municipio', $codigo_municipio)
            ->get();

        // Construir las opciones <option>
        $html = '<option value="">Seleccione una Comuna</option>'; // Opción inicial
        foreach ($comunas as $comuna) {
            $html .= '<option value="' . $comuna->codigo . '">' . $comuna->comuna . '</option>';
        }

        return $html;
    }

    public static function obtenerBarriosPorComuna($codigo_comuna)
    {
        $barrios = DB::table('listas_generales.t1_barrio')
            ->select('codigo', 'barrio')
            ->where('comuna', $codigo_comuna)
            ->get();

        // Construir las opciones <option>
        $html = '<option value="">Seleccione un Barrio</option>'; // Opción inicial
        foreach ($barrios as $barrio) {
            $html .= '<option value="' . $barrio->codigo . '">' . $barrio->barrio . '</option>';
        }

        return $html;
    }



    
}

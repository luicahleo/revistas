<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revista extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_revista';


    const CREATED_AT = null;
    const UPDATED_AT = null;
    public $timestamp = false;

    public function scopeDepartamento($query, $departamento_id){
        if($departamento_id){
            return $query->where('id_departamento', $departamento_id);
        }
    }

    public function scopeIdioma($query, $idioma_id){
        if($idioma_id){
            return $query->where('id_idioma', $idioma_id);
        }
    }

    protected $fillable = [ 'titulo', 
                            'acronimo_GLAS',
                            'periodicidad',
                            'pais_origen',
                            'idioma',
                            'ISSN',
                            'ISSN_version_e',
                            'editor',
                            'materia',
                            'direccion_url',
                            'id_responsable',
                            'depositada_en',
                            'departamento',
                            'catedra',
                            'localizacion',
                            'estanteria',
                            'adquisicion',
                            'suscripcion_papel',
                            'anyo_papel',
                            'pack_electronico',
                            'anyo_electronico',
                            'fondos',
                            'web',
                            'indices_en_web',
                            'full_text_en_web',
                            'revista_electronica',
                            'revista_electronica2',


    ];
}



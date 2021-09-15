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

    protected $fillable = ['titulo', 'pais_origen', 'idioma'];





}



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revista extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_revista';


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







}



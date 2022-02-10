<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coleccion extends Model
{
    use HasFactory;


    protected $table = 'coleccion';
    protected $primaryKey = 'coleccion_id';


    const CREATED_AT = null;
    const UPDATED_AT = null;
    public $timestamp = false;

    protected $fillable = ['id_revista', 
                            'anyo',
                            'volumen', 
                            'ene', 
                            'feb', 
                            'mar',
                            'abr',
                            'may',
                            'jun',
                            'jul',
                            'ago',
                            'sep',
                            'oct',
                            'nov',
                            'dic',
                            'observaciones',
                        ];



}

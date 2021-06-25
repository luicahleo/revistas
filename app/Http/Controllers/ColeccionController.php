<?php

namespace App\Http\Controllers;

use App\Models\Coleccion;
use Illuminate\Http\Request;

class ColeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colecciones = Coleccion::all();

        //return $colecciones;

        return view('coleccion.index', compact('colecciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coleccion  $coleccion
     * @return \Illuminate\Http\Response
     */
    public function show(Coleccion $coleccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coleccion  $coleccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Coleccion $coleccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coleccion  $coleccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coleccion $coleccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coleccion  $coleccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coleccion $coleccion)
    {
        //
    }
}

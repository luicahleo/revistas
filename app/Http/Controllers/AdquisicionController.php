<?php

namespace App\Http\Controllers;

use App\Models\Adquisicion;
use Illuminate\Http\Request;

class AdquisicionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adquisiciones = Adquisicion::all();


        return view('adquisicion.index', compact('adquisiciones'));
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
     * @param  \App\Models\Adquisicion  $adquisicion
     * @return \Illuminate\Http\Response
     */
    public function show(Adquisicion $adquisicion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adquisicion  $adquisicion
     * @return \Illuminate\Http\Response
     */
    public function edit(Adquisicion $adquisicion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adquisicion  $adquisicion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adquisicion $adquisicion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adquisicion  $adquisicion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adquisicion $adquisicion)
    {
        //
    }
}

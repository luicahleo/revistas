<?php

namespace App\Http\Controllers\Hemeroteca;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Revista;

class RevistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hemeroteca.revistas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $revista = Revista::all();

        //return $revista;

        return view('hemeroteca.revistas.create', compact('revista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //return $request;


        $request->validate([
            'titulo' => 'required',
            'pais_origen' => 'required',
            'idioma' => 'required',
            'materia' => 'required',
            'editor' => 'required',
            'ISSN' => 'required',
            'id_responsable' => 'required|numeric',



        ]);

        $revista = Revista::create($request->all());
        
        //return $revista;
        //return redirect()->route('hemeroteca.revistas.edit', $revista);
        return redirect()->route('hemeroteca.revistas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Revista $revista)
    {
        return view('hemeroteca.revistas.show', compact('revista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Revista $revista)
    {


        return view('hemeroteca.revistas.edit', compact('revista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Revista $revista)
    {
        $request->validate([
            'titulo' => 'required',
            'pais_origen' => 'required',
            'idioma' => 'required',

        ]);

        $revista->update($request->all());

        return redirect()->route('hemeroteca.revistas.index' , $revista);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Revista $revista)
    {
        //return $revista;

        $revista->delete();
        return redirect()->route('hemeroteca.revistas.index');
    }
}

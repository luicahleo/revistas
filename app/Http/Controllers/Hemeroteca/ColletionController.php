<?php

namespace App\Http\Controllers\Hemeroteca;

use App\Http\Controllers\Controller;
use App\Models\Coleccion;
use Illuminate\Http\Request;

class ColletionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hemeroteca.collections.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return $collection;
        //$collection = Coleccion::all();

        // return view('hemeroteca.collections.create', compact('collection'));
        return view('hemeroteca.collections.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        
        //return $request;


        $request->validate([
            'id_revista'=>'required',
            'anyo'=>'required',
            'volumen'=>'required'
         ]);

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Coleccion $collection)
    {
        $collections = Coleccion::where('id_revista', $collection->coleccion_id)->get();
        //dd($collections);
        //$collection = Coleccion::where('id_revista', $collection->coleccion_id);

        //return $collection->coleccion_id;

        //return $collection;

        return view('hemeroteca.collections.show', compact('collections','collection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Coleccion $collection)
    {
        

        return view('hemeroteca.collections.edit', compact('collection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

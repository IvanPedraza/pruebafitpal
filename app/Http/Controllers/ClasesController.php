<?php

namespace App\Http\Controllers;

use App\Clases;
use Illuminate\Http\Request;
use App\Http\Resources\Clases as ClasesResource;
use App\Http\Resources\ClasesCollection;

class ClasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$clases = Clases::all();
        return new ClasesCollection(Clases::all());
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$clases = Clases::create($request->all());
        //return $clases;

        $request->validate([
            'nombre'    =>  'required|max:255',
        ]);

        $clases = Clases::create($request->all());

        return (new ClasesResource($clases))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clases  $clases
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ClasesResource(Clases::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clases  $clases
     * @return \Illuminate\Http\Response
     */
    public function edit(Clases $clases)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clases  $clases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clases $clases)
    {
        $clases = Clases::findOrFail($request->id);

        $clases->nombre=$request->nombre;
        $clases->fecha=$request->fecha;
        $clases->cupos=$request->cupos;

        $clases->save();

        return $clases;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clases  $clases
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clases = Clases::findOrFail($id);
        $clases->delete();

        return response()->json(null, 204);
    }
}

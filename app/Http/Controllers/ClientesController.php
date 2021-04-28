<?php

namespace App\Http\Controllers;

use App\Clientes;
use Illuminate\Http\Request;
use App\Http\Resources\Clientes as ClientesResource;
use App\Http\Resources\ClientesCollection;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$clientes = Clientes::all();
        //return $clientes;
        return new ClientesCollection(Clientes::all());
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
        //$clientes = Clientes::create($request->all());
        //return $clientes;

        $request->validate([
            'nombre'    =>  'required|max:255',
        ]);

        $clientes = Clientes::create($request->all());

        return (new ClientesResource($clientes))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ClientesResource(Clientes::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clientes $clientes)
    {
        $clientes = Clientes::findOrFail($request->id);

        $clientes->nombre=$request->nombre;
        $clientes->email=$request->email;
        $clientes->cedula=$request->cedula;
        $clientes->contrasena=$request->contrasena;


        $clientes->save();

        return $clientes;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = Clientes::findOrFail($id);
        $clientes->delete();

        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Reservas;
use Illuminate\Http\Request;
use App\Http\Resources\Reservas as ReservasResource;
use App\Http\Resources\ReservasCollection;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$reservas = Reservas::all();
        //return $reservas;
        return new ReservasCollection(Reservas::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$reserva = Reservas::create($request->all());
        //return $reserva;

        $request->validate([
            'nombre'    =>  'required|max:255',
        ]);

        $reservas = Reservas::create($request->all());

        return (new ReservasResource($reservas))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ReservasResource(Reservas::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservas $reservas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservas $reservas)
    {
        $reservas = Reservas::findOrFail($request->id);

        $reservas->fecha=$request->fecha;

        $reservas->save();

        return $reservas;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservas = Reservas::findOrFail($id);
        $reservas->delete();

        return response()->json(null, 204);
    }
}

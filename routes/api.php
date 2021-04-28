<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource("usuarios", "UsuariosController");
Route::apiResource("clases", "ClasesController");
Route::apiResource("reservas", "ReservasController");
Route::apiResource("clientes", "ClientesController");

Route::get('/clientes/{id}', 'ClientesController@show');
Route::get('/clases/{id}', 'ClasesController@show');
Route::get('/reservas/{id}', 'ReservasController@show');

Route::get("/clientes", "ClientesController@index");
Route::get("/clases", "ClasesController@index");
Route::get("/reservas", "ReservasController@index");

Route::post("/clientes", "ClientesController@store");
Route::post("/clases", "ClasesController@store");
Route::post("/reservas", "ReservasController@store");

Route::put("/clientes", "ClientesController@update");
Route::put("/clases", "ClasesController@update");
Route::put("/reservas", "ReservasController@update");

Route::delete("/clientes", "ClientesController@destroy");
Route::delete("/clases", "ClasesController@destroy");
Route::delete("/reservas", "ReservasController@destroy");




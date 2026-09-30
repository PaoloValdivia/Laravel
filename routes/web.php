<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Mensaje;

Route::get('/', function () {
    $mensajes = Mensaje::latest()->get();
    return view('formulario', compact('mensajes'));
});

Route::post('/guardar', function (Request $request) {
    $request->validate([
        'nombre'  => 'required|max:50',
        'mensaje' => 'required|max:255',
    ]);

    Mensaje::create([
        'nombre'  => $request->nombre,
        'mensaje' => $request->mensaje,
    ]);

    return redirect('/')->with('exito', '¡Guardado correctamente en MySQL!');
});
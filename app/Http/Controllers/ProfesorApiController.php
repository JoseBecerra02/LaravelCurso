<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
use Illuminate\Support\Str;


class ProfesorApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profesores  = Profesor::orderBy('id', 'desc')->get();
        return response()->json($profesores, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save = new Profesor;
        $save->nombre = $request->input('nombre');
        $save->edad = $request->input('edad');
        $save->documento = $request->input('documento');
        $save->titulo = $request->input('titulo');
        $save->vinculacion = $request->input('vinculacion');
        $save->slug = Str::slug($request->input('documento'), '-');
        $save->save();

        // Responder con éxito
        $array = array(
            'response' => array(
                'estado' => 'Ok',
                'message' => 'Profesor creado correctamente'
            )
        );
        return response()->json($array, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profesores  = Profesor::where(['id'=>$id])->firstOrFail();
        return response()->json($profesores, 200);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profesor = Profesor::where(['id'=>$id])->firstOrFail();
        $profesor->nombre = $request->input('nombre');
        $profesor->edad = $request->input('edad');
        $profesor->documento = $request->input('documento');
        $profesor->titulo = $request->input('titulo');
        $profesor->vinculacion = $request->input('vinculacion');
        $profesor->slug = Str::slug($request->input('documento'), '-');
        $profesor->save();

        // Responder con éxito
        $array = array(
            'response' => array(
                'estado' => 'Ok',
                'message' => 'Profesor actualizado correctamente'
            )
        );
        return response()->json($array, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profesor = Profesor::where(['id'=>$id])->firstOrFail();
        Profesor::where('id', $id)->delete();
        // Responder con éxito
        $array = array(
            'response' => array(
                'estado' => 'Ok',
                'message' => 'Profesor eliminado correctamente'
            )
        );
        return response()->json($array, 200);
    }
}

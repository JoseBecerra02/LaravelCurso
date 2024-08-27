<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Profesor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filtro = $request->input('filtro');
        $clases = Clase::orderBy($filtro)->orderBy('id', 'desc')->get();
        // dd($clases);
        return view('bd.clases',compact('clases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profesores=Profesor::get();
        return view('bd.clases_add',compact('profesores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Clase::where(['nombre'=>$request->input('nombre')])->count()==0){
            $request->validate([
                'nombre' => 'required|min:2',
                'jornada' => 'required',
                'estudiantes' => 'required|numeric',
            ],[
                'nombre.required' => 'El campo nombre es obligatorio',
                'nombre.min' => 'El campo nombre debe tener al menos 6 caracteres',
                'jornada.required' => 'El campo jornada es obligatorio',
                'estudiantes.required' => 'El campo estudiantes es obligatorio',
                'estudiantes.numeric' => 'El campo estudiantes debe ser un número',
            ]);
            Clase::create(
                [
                    'nombre' => $request->input('nombre'),
                    'profesor_id' => $request->input('profesor_id'),
                    'jornada' => $request->input('jornada'),
                    'estudiantes' => $request->input('estudiantes'),
                    'slug' => Str::slug($request->input('nombre'),'-'),
                ]
            );
            $request->session()->flash('css', 'success');
            $request->session()->flash('mensaje', 'Clase creada correctamente');
            return redirect()->route('clase.create');
        }else{
            $request->session()->flash('css', 'danger');
            $request->session()->flash('mensaje', 'Ya existe una clase con ese nombre');
            return redirect()->route('clase.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profesores=Profesor::get();
        $clases = Clase::where(['id'=>$id])->firstOrFail();
        return view('bd.clases_edit', compact('clases','profesores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|min:2',
            'jornada' => 'required',
            'estudiantes' => 'required|numeric',
        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.min' => 'El campo nombre debe tener al menos 6 caracteres',
            'jornada.required' => 'El campo jornada es obligatorio',
            'estudiantes.required' => 'El campo estudiantes es obligatorio',
            'estudiantes.numeric' => 'El campo estudiantes debe ser un número',
        ]);
        Clase::where('id',$id)->update(
            [
                'nombre' => $request->input('nombre'),
                'profesor_id' => $request->input('profesor_id'),
                'jornada' => $request->input('jornada'),
                'estudiantes' => $request->input('estudiantes'),
                'slug' => Str::slug($request->input('nombre'),'-'),
            ]
        );
        $clase = Clase::where(['id'=>$id])->firstOrFail();
        $clase->nombre = $request->input('nombre');
        $clase->profesor_id = $request->input('profesor_id');
        $clase->jornada = $request->input('jornada');
        $clase->estudiantes = $request->input('estudiantes');
        $clase->slug = Str::slug($request->input('nombre'),'-');
        $clase->save();

        $request->session()->flash('css', 'success');
        $request->session()->flash('mensaje', 'Clase actualizada correctamente');
        return redirect()->route('clase.edit', ['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $filtro  = "id";
        $clase = Clase::findOrFail($id);
        $clase->delete();
        $request->session()->flash('css', 'success');
        $request->session()->flash('mensaje', 'Clase eliminada correctamente');
        return redirect()->route('clase.index',compact('filtro'));
    }
}

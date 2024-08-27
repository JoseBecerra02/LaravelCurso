<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiantes;
use App\Models\Clase;
use Illuminate\Support\Str;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filtro = $request->input('filtro');
        $estudiantes = Estudiantes::orderBy($filtro)->orderBy('id', 'desc')->get();
        return view('bd.estudiantes',compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ldate = date('Y-m-d');
        $clases = Clase::get();
        return view('bd.estudiantes_add',compact('ldate', 'clases'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:6',
            'edad' => 'required|numeric',
            'documento' => 'required|numeric',
            'ingreso'=> 'required',
            'clase' => 'required',
        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.min' => 'El campo nombre debe tener al menos 6 caracteres',
            'edad.required' => 'El campo edad es obligatorio',
            'edad.numeric' => 'El campo edad debe ser un número',
            'documento.required' => 'El campo documento es obligatorio',
            'documento.numeric' => 'El campo documento debe ser un número',
            'ingreso.required' => 'El campo ingreso es obligatorio',
            'clase.required' => 'El campo clase es obligatorio',
        ]);
        Estudiantes::create(
            [
                'nombre' => $request->input('nombre'),
                'edad' => $request->input('edad'),
                'documento' => $request->input('documento'),
                'ingreso' => $request->input('ingreso'),
                'clase_id' => $request->input('clase'),
                'slug' => Str::slug($request->input('documento'),'-'),
            ]
        );
        $request->session()->flash('css', 'success');
        $request->session()->flash('mensaje', 'Estudiante creado correctamente');
        return redirect()->route('estudiante.create');
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
        $ldate = date('Y-m-d');
        $clases = Clase::get();
        $estudiante = Estudiantes::where(['id'=>$id])->firstOrFail();
        return view('bd.estudiantes_edit', compact('estudiante','ldate','clases'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|min:6',
            'edad' => 'required|numeric',
            'documento' => 'required|numeric',
            'ingreso'=> 'required',
            'clase' => 'required',
        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.min' => 'El campo nombre debe tener al menos 6 caracteres',
            'edad.required' => 'El campo edad es obligatorio',
            'edad.numeric' => 'El campo edad debe ser un número',
            'documento.required' => 'El campo documento es obligatorio',
            'documento.numeric' => 'El campo documento debe ser un número',
            'ingreso.required' => 'El campo ingreso es obligatorio',
            'clase.required' => 'El campo clase es obligatorio',
        ]);
        Estudiantes::where('id',$id)->update(
            [
                'nombre' => $request->input('nombre'),
                'edad' => $request->input('edad'),
                'documento' => $request->input('documento'),
                'ingreso' => $request->input('ingreso'),
                'clase_id' => $request->input('clase'),
                'slug' => Str::slug($request->input('documento'),'-'),
            ]
        );
        $estudiante = Estudiantes::where(['id'=>$id])->firstOrFail();
        $estudiante->nombre = $request->input('nombre');
        $estudiante->edad = $request->input('edad');
        $estudiante->documento = $request->input('documento');
        $estudiante->ingreso = $request->input('ingreso');
        $estudiante->clase_id = $request->input('clase');
        $estudiante->slug = Str::slug($request->input('documento'),'-');
        $estudiante->save();

        $request->session()->flash('css', 'success');
        $request->session()->flash('mensaje', 'Estudiante actualizado correctamente');
        return redirect()->route('estudiante.edit', ['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $filtro = "id";
        Estudiantes::where('id',$id)->delete();
        $request->session()->flash('css', 'success');
        $request->session()->flash('mensaje', 'Estudiante eliminado correctamente');
        return redirect()->route('estudiante.index', compact('filtro'));
    }
}

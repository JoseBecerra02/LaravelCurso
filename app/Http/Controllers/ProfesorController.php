<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
use Illuminate\Support\Str;


class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filtro = $request->input('filtro');
        $profesores = Profesor::orderBy($filtro)->orderBy('id', 'desc')->get();

        // dd($profesores);
        return view('bd.profesores',compact('profesores'));
    }
    public function indexApi()
    {
        $profesores = orderBy('id', 'desc')->get();

        // dd($profesores);
        return view('bd.profesores',compact('profesores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ldate = date('Y-m-d');
        return view('bd.profesores_add',compact('ldate'));
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
            'titulo' => 'required',
            'vinculacion' => 'required',
        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.min' => 'El campo nombre debe tener al menos 6 caracteres',
            'edad.required' => 'El campo edad es obligatorio',
            'edad.numeric' => 'El campo edad debe ser un número',
            'documento.required' => 'El campo documento es obligatorio',
            'documento.numeric' => 'El campo documento debe ser un número',
            'titulo.required' => 'El campo título es obligatorio',
            'vinculacion.required' => 'El campo vinculación es obligatorio',
        ]);
        Profesor::create(
            [
                'nombre' => $request->input('nombre'),
                'edad' => $request->input('edad'),
                'documento' => $request->input('documento'),
                'titulo' => $request->input('titulo'),
                'vinculacion' => $request->input('vinculacion'),
                'slug' => Str::slug($request->input('documento'),'-'),
            ]
        );
        $request->session()->flash('css', 'success');
        $request->session()->flash('mensaje', 'Profesor creado correctamente');
        return redirect()->route('profesor.create');
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
        try {
            $ldate = date('Y-m-d');
            $profesor = Profesor::where(['id'=>$id])->firstOrFail();
            return view('bd.profesores_edit', compact('profesor','ldate'));
        } catch (\Exception $e) {
            throw $e;
            return redirect()->route('profesor.edit',['id'=>$id]);
        }
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
            'titulo' => 'required',
            'vinculacion' => 'required',
        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.min' => 'El campo nombre debe tener al menos 6 caracteres',
            'edad.required' => 'El campo edad es obligatorio',
            'edad.numeric' => 'El campo edad debe ser un número',
            'documento.required' => 'El campo documento es obligatorio',
            'documento.numeric' => 'El campo documento debe ser un número',
            'titulo.required' => 'El campo título es obligatorio',
            'vinculacion.required' => 'El campo vinculación es obligatorio',
        ]);
        Profesor::where('id',$id)->update(
            [
                'nombre' => $request->input('nombre'),
                'edad' => $request->input('edad'),
                'documento' => $request->input('documento'),
                'titulo' => $request->input('titulo'),
                'vinculacion' => $request->input('vinculacion'),
                'slug' => Str::slug($request->input('documento'),'-'),
            ]
        );
        $profesor = Profesor::where(['id'=>$id])->firstOrFail();
        $profesor->nombre = $request->input('nombre');
        $profesor->edad = $request->input('edad');
        $profesor->documento = $request->input('documento');
        $profesor->titulo = $request->input('titulo');
        $profesor->vinculacion = $request->input('vinculacion');
        $profesor->slug = Str::slug($request->input('documento'),'-');
        $profesor->save();

        $request->session()->flash('css', 'success');
        $request->session()->flash('mensaje', 'Profesor actualizado correctamente');
        return redirect()->route('profesor.edit', ['id'=>$id]);
    }

    public function destroy(Request $request, string $id)
    {
        $profesor = Profesor::findOrFail($id);
        $clases_docente = $profesor->clases;

        if (!$clases_docente->isEmpty()) {
            $request->session()->flash('css', 'danger');
            $request->session()->flash('mensaje', 'No se puede eliminar el profesor');
            return redirect()->route('profesor.index',['filtro' => 'id']);
        }
        $profesor->delete();
        $request->session()->flash('css', 'success');
        $request->session()->flash('mensaje', 'Se eliminó el profesor correctamente');
        return redirect()->route('profesor.index',['filtro' => 'id']);
    }
}

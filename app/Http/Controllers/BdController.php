<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
use App\Models\Clase;
use App\Models\Estudiantes;
use Illuminate\Support\Str;

class BdController extends Controller
{
    public function bd_inicio(){
        return view('bd.home');
    }
    public function bd_profesores(Request $request){
        $filtro = $request->input('filtro');
        $profesores = Profesor::orderBy($filtro)->orderBy('id', 'desc')->get();

        // dd($profesores);
        return view('bd.profesores',compact('profesores'));
    }
    public function bd_profesores_add(){
        $ldate = date('Y-m-d');
        return view('bd.profesores_add',compact('ldate'));
    }
    public function bd_profesores_add_post(Request $request){
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
        return redirect()->route('bd_profesores_add');
    }
    public function bd_profesores_edit($id){
        $ldate = date('Y-m-d');
        $profesor = Profesor::where(['id'=>$id])->firstOrFail();
        return view('bd.profesores_edit', compact('profesor','ldate'));
    }
    public function bd_profesores_edit_post(Request $request, $id){
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
        return redirect()->route('bd_profesores_edit', ['id'=>$id]);
    }
    public function bd_profesores_delete(Request $request, $id){
        if(Clase::where(['profesor_id'=>$id])->count()==0){
            Profesor::where(['id'=>$id])->delete();
            $request->session()->flash('css', 'success');
            $request->session()->flash('mensaje', 'Se eliminó el profesor correctamente');
            return redirect()->route('bd_profesores');
        }else{
            $request->session()->flash('css', 'danger');
            $request->session()->flash('mensaje', 'No se puede eliminar el profesor');
            return redirect()->route('bd_profesores');
        }
        Profesor::where('id',$id)->delete();
        $request->session()->flash('css', 'success');
        $request->session()->flash('mensaje', 'Profesor eliminado correctamente');
        return redirect()->route('bd_profesores');
    }

    public function bd_clases(Request  $request){
        $filtro = $request->input('filtro');
        $clases = Clase::orderBy($filtro)->orderBy('id', 'desc')->get();
        // dd($clases);
        return view('bd.clases',compact('clases'));
    }
    public function bd_clases_add(){
        $profesores=Profesor::get();
        return view('bd.clases_add',compact('profesores'));
    }
    public function bd_clases_add_post(Request $request){
        
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
            return redirect()->route('bd_clases_add');
        }else{
            $request->session()->flash('css', 'danger');
            $request->session()->flash('mensaje', 'No se puede crear la clase');
            return redirect()->route('bd_clases_add');
        }
        
    }
    public function bd_clases_edit($id){
        $profesores=Profesor::get();
        $clases = Clase::where(['id'=>$id])->firstOrFail();
        return view('bd.clases_edit', compact('clases','profesores'));
    }
    public function bd_clases_edit_post(Request $request,  $id){
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
        return redirect()->route('bd_clases_edit', ['id'=>$id]);
    }
    public function bd_clases_delete(Request $request, $id){
        Clase::where('id',$id)->delete();
        $request->session()->flash('css', 'success');
        $request->session()->flash('mensaje', 'Clase eliminada correctamente');
        return redirect()->route('bd_clases');
    }
    public function bd_estudiantes(Request $request){
        $filtro = $request->input('filtro');
        $estudiantes = Estudiantes::orderBy($filtro)->orderBy('id', 'desc')->get();
        // dd($profesores);
        return view('bd.estudiantes',compact('estudiantes'));
    }
    public function bd_estudiantes_add(){
        $ldate = date('Y-m-d');
        $clases = Clase::get();
        return view('bd.estudiantes_add',compact('ldate', 'clases'));
    }
    public function bd_estudiantes_add_post(Request $request){
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
        return redirect()->route('bd_estudiantes_add');
    }
    public function bd_estudiantes_edit($id){
        $ldate = date('Y-m-d');
        $clases = Clase::get();
        $estudiante = Estudiantes::where(['id'=>$id])->firstOrFail();
        return view('bd.estudiantes_edit', compact('estudiante','ldate','clases'));
    }
    public function bd_estudiantes_edit_post(Request $request, $id){
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
        return redirect()->route('bd_estudiantes_edit', ['id'=>$id]);
    }
    public function bd_estudiantes_delete(Request $request, $id){
        Estudiantes::where('id',$id)->delete();
        $request->session()->flash('css', 'success');
        $request->session()->flash('mensaje', 'Estudiante eliminado correctamente');
        return redirect()->route('bd_estudiantes');
    }
}

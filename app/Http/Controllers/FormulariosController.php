<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormulariosController extends Controller
{
    public function formularios_inicio(){
        return view('formularios.home');
    }
    public function formularios_simple(){
        return view('formularios.simple');
    }
    public function formularios_simple_post(Request $request){
        $request->validate(
            [
                'nombre'=>'required|min:6',
                'correo'=>'required|email',
                'descripcion'=>'required',
                'password'=>'required|min:6'

            ],[
                'nombre.required'=>'El campo nombre es requerido',
                'nombre.min'=>'El campo nombre debe tener al menos 6 caracteres',
                'correo.required'=>'El campo correo es requerido',
                'correo.email'=>'El campo correo debe ser un correo valido',
                'descripcion.required'=>'El campo descripcion es requerido',
                'password.required'=>'El campo contraseña es requerido',
                'password.min'=>'El campo contraseña debe tener al menos 6 caracteres'
            ]
        );
    }
}

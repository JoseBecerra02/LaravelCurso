<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Perfiles;
use App\Models\UsersMetadata;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class AccesoContoller extends Controller
{
    public function acceso_login(){
        return view('acceso.login');
    }
    public function acceso_login_post(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],
        [
            'email.required' => 'El campo email es requerido',
            'email.email' => 'El campo email debe ser un email válido',
            'password.required' => 'El campo contraseña es requerido',
        ]);
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            $usuario = User::where('id', Auth::user()->id)->first();
            session(['perfil_id' => $usuario->perfil_id]);
            session(['perfil' => $usuario->name]);

            return redirect()->intended('/');

        }else{
            $request->session()->flash('css', 'danger');
            $request->session()->flash('mensaje', 'Usuario o contraseña incorrectos');
            return redirect()->route('acceso_login');
        }
        
    }
    public function acceso_registro(){
        return view('acceso.registro');
    }
    public function acceso_registro_post(Request $request){
        $request->validate([
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users,email',
            'telefono' => 'required',
            'direccion' => 'required ',
            'password' => 'required|min:6|confirmed',
        ],
        [
            'name.required' => 'El campo nombre es requerido',
            'name.min' => 'El campo nombre debe tener al menos 6 caracteres',
            'email.required' => 'El campo email es requerido',
            'email.email' => 'El campo email debe ser un email válido',
            'email.unique' => 'El email ya está registrado',
            'telefono.required' => 'El campo teléfono es requerido',
            'direccion.required' => 'El campo dirección es requerido',
            'password.required' => 'El campo contraseña es requerido',
            'password.min' => 'El campo contraseña debe tener al menos 6 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
        ]);
        $user  = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        UsersMetadata::create([
            'users_id' => $user->id,
            'perfil_id' => 2,
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
        ]);
        $request->session()->flash('css', 'success');
        $request->session()->flash('mensaje', 'Usuario registrado correctamente');
        return redirect()->route('acceso_registro');
    }
    public function acceso_logout(Request $request){
        Auth::logout();
        $request->session()->forget('perfil_id');
        $request->session()->forget('perfil');
        
        $request->session()->flash('css', 'success');
        $request->session()->flash('mensaje', 'Cerraste sesión correctamente');
        return redirect()->route('acceso_login');
    }
}

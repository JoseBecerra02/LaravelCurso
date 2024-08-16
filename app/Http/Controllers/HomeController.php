<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home_inicio()
    {
        $texto = "Hola con ñandu modificada";
        $numero = 12;
        return view('home.home',compact('texto','numero'));
    }
    public function home_hola()
    {
        echo "Hola desde hola";
    }
    public function home_parametros($id, $slug)
    {
        echo "Hola desde parametros, el id es: $id y el slug es: $slug";
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\ValidaSelect;

class FormulariosController extends Controller
{
    public function formularios_inicio(){
        return view('formularios.home');
    }
    public function formularios_simple(){
        $paises=array(
            array(
                "nombre"=>"Chile", "id"=>1
            ),
            array(
                "nombre"=>"Perú", "id"=>2
            ),
            array(
                "nombre"=>"Venezuela", "id"=>3
            ),
            array(
                "nombre"=>"México", "id"=>4
            ),
            array(
                "nombre"=>"España", "id"=>5
            )
        );
        $intereses=array(
            array(
                "nombre"=>"Deportes", "id"=>1
            ),
            array(
                "nombre"=>"Música", "id"=>2
            ),
            array(
                "nombre"=>"Religión", "id"=>3
            ),
            array(
                "nombre"=>"Comida", "id"=>4
            ),
            array(
                "nombre"=>"Viajes", "id"=>5
            )
        );
        return view('formularios.simple',compact('paises','intereses'));
    }
    public function formularios_simple_post(Request $request){
        $request->validate(
            [
                'nombre'=>'required|min:6',
                'correo'=>'required|email',
                'descripcion'=>'required',
                'password'=>'required|min:6',
                'pais'=>[new ValidaSelect],

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
        $intereses=array(
            array(
                "nombre"=>"Deportes", "id"=>1
            ),
            array(
                "nombre"=>"Música", "id"=>2
            ),
            array(
                "nombre"=>"Religión", "id"=>3
            ),
            array(
                "nombre"=>"Comida", "id"=>4
            ),
            array(
                "nombre"=>"Viajes", "id"=>5
            )
        );
        foreach($intereses as $key=>$interes){
            if(isset($_POST['interes_'.$key])){
                echo $_POST['interes_'.$key]."<br/>";
            }
        }
    }
    public function formularios_flash(){
        return view('formularios.flash');
    }
    public function formularios_flash2(Request $request){
        $request->session()->flash('css','success');
        $request->session()->flash('mensaje','Mensaje dese flash');
        return redirect()->route('formularios_flash3');
    }
    public function formularios_flash3(){
        return view('formularios.flash3');
    }
    public function formularios_upload(){
        return view('formularios.upload');
    }
    public function formularios_upload_post(Request $request){
        $request->validate(
            [
                'foto'=>'required|mimes:jpg,jpeg,png|max:2048',
            ],[
                'archivo.required'=>'El campo archivo es requerido',
                'archivo.mimes'=>'El campo archivo debe ser un archivo jpg,jpeg,png',
                'archivo.max'=>'El campo archivo debe tener un tamaño maximo de 2MB',
            ]
        );
        switch($_FILES['foto']['type']){
            case 'image/jpeg':
                $archivo=time().'.jpg';
            break;
            case 'image/png':
                $archivo=time().'.png';
            break;
        }
        copy($_FILES['foto']['tmp_name'],'upload/udemy'.$archivo);
        $request->session()->flash('css','success');
        $request->session()->flash('mensaje','Se subio correctamente el archivo');
        return redirect()->route('formularios_upload');

    }
}

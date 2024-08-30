@extends('../layouts/frontend')
@section('content')
<h1>Registro</h1>
<x-flash/>
<form action="{{route('acceso_registro_post')}}"  method="post">
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" value="{{old('nombre')}}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
    </div>
    <div class="form-group">
        <label for="telefono">Telefono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="{{old('telefono')}}">
    </div>
    <div class="form-group">
        <label for="direccion">Direccion</label>
        <input type="text" class="form-control" id="direccion" name="direccion" value="{{old('direccion')}}">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
        <label for="password2">Repetir Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>
    <hr>
    {{csrf_field()}}
    <input type="submit" class="btn btn-primary" value="Enviar"/>
</form>
@endsection
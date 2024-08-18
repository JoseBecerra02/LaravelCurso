@extends('../layouts.frontend')

@section('content')
    <h1>Crear profesor</h1>
    <x-flash />
    <form action="{{route('bd_profesores_add')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">
        </div>
        <div class="form-group">
            <label for="nombre" class="form-label">Edad</label>
            <input type="number" class="form-control" id="edad" name="edad" value="{{old('edad')}}">
        </div>
        <div class="form-group">
            <label for="nombre" class="form-label">Documento de identidad</label>
            <input type="number" class="form-control" id="documento" name="documento" value="{{old('documento')}}">
        </div>
        <div class="form-group">
            <label for="nombre" class="form-label">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{old('titulo')}}">
        </div>
        <div class="form-group">
            <label for="nombre" class="form-label">Vinculacion</label>
            <input type="date" class="form-control" id="vinculacion" name="vinculacion" value="{{old('vinculacion')}}" max="{{$ldate}}">
        </div>
        <hr>
        {{csrf_field()}}
        <input type="submit" value="Guardar" class="btn btn-primary">

        
    </form>
@endsection
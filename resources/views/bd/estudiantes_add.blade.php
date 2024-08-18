@extends('../layouts.frontend')

@section('content')
    <h1>Crear estudiantes</h1>
    <x-flash />
    <form action="{{route('bd_estudiantes_add_post')}}" method="POST">
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
            <label for="nombre" class="form-label">Ingreso</label>
            <input type="date" class="form-control" id="ingreso" name="ingreso" value="{{old('clase')}}" max={{$ldate}}>
        </div>
        <div class="form-group">
            <label for="nombre" class="form-label">Clase</label>
            <select name="clase" id="clase" class="form-control" value="{{old('clase')}}">
                @foreach ($clases as $clase)
                    <option value="{{$clase->id}}">{{$clase->nombre}}</option>
                @endforeach
        </div>
        
        <hr>
        {{csrf_field()}}
        <input type="submit" value="Guardar" class="btn btn-primary">

        
    </form>
@endsection
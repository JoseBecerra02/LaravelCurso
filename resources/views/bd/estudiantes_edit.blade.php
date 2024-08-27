@extends('../layouts.frontend')

@section('content')
    <h1>Editar estudiante</h1>
    <x-flash />
    <form action="{{route('estudiante.update', ['id'=>$estudiante->id])}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$estudiante->nombre}}">
        </div>
        <div class="form-group">
            <label for="nombre" class="form-label">Edad</label>
            <input type="number" class="form-control" id="edad" name="edad" value="{{$estudiante->edad}}">
        </div>
        <div class="form-group">
            <label for="nombre" class="form-label">Documento de identidad</label>
            <input type="number" class="form-control" id="documento" name="documento" value="{{$estudiante->documento}}">
        </div>
        <div class="form-group">
            <label for="nombre" class="form-label">Ingreso</label>
            <input type="date" class="form-control" id="ingreso" name="ingreso"   max="{{$ldate}}" value="{{$estudiante->ingreso}}">
        </div>
        <div class="form-group">
            <label for="nombre" class="form-label">Clase</label>
            <select name="clase" id="clase" class="form-control" value="{{$estudiante->clase->id}}">
                @foreach ($clases as $clase)
                    <option value="{{$clase->id}}">{{$clase->nombre}}</option>
                @endforeach
            </select>
        </div>
        
        <hr>
        {{csrf_field()}}
        <input type="submit" value="Guardar" class="btn btn-primary">

        
    </form>
@endsection
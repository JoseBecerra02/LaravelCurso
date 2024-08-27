@extends('../layouts.frontend')

@section('content')
    <h1>Crear clase</h1>
    <x-flash />
    <form action="{{route('clase.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">
        </div>
        <div class="form-group">
            <label for="profesor" class="form-label">Profesor</label>
            <br>
            <select name="profesor_id" id="profesor_id" class="form-control" >
                @foreach ($profesores as $profesor)
                    <option value="{{$profesor->id}}">{{$profesor->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="jornada" class="form-label">Jornada</label>
            <select name="jornada" id="jornada" class="form-control">
                <option value="mañana">Mañana</option>
                <option value="tarde">Tarde</option>
                <option value="noche">Noche</option>
            </select>
        </div>
        <div class="form-group">
            <label for="estudiantes" class="form-label">Estudiantes</label>
            <input type="number" class="form-control" id="estudiantes" name="estudiantes" value="{{old('estudiantes')}}">
        </div>
        <hr>
        {{csrf_field()}}
        <input type="submit" value="Guardar" class="btn btn-primary">

        
    </form>
@endsection
@extends('../layouts.frontend')

@section('content')
    <h1>Editar clase</h1>
    <x-flash />
    <form action="{{route('bd_clases_edit_post', ['id' => $clases->id])}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$clases->nombre}}">
        </div>
        <div class="form-group">
            <label for="profesor" class="form-label">Profesor</label>
            <br>
            <select name="profesor_id" id="profesor_id" class="form-control" value="{{$clases->profesor}}">
                @foreach ($profesores as $profesor)
                    <option value="{{$profesor->id}}">{{$profesor->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="jornada" class="form-label">Jornada</label>
            <select name="jornada" id="jornada" class="form-control"  value="{{$clases->jornada}}">
                <option value="mañana">Mañana</option>
                <option value="tarde">Tarde</option>
                <option value="noche">Noche</option>
            </select>
        </div>
        <div class="form-group">
            <label for="estudiantes" class="form-label">Estudiantes</label>
            <input type="number" class="form-control" id="estudiantes" name="estudiantes" value="{{$clases->Estudiantes}}">
        </div>
        <hr>
        {{csrf_field()}}
        <input type="submit" value="Guardar" class="btn btn-primary">        
    </form>
@endsection
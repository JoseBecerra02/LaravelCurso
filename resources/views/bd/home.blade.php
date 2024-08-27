@extends('../layouts.frontend')

@section('content')
    <h1>Bd Mysql</h1>
    <ul>
        <li><a href="{{route('profesor.index',['filtro' => 'id'])}}">Profesores</a></li>
        <li><a href="{{route('clase.index',['filtro' => 'id'])}}">Cursos</a></li>
        <li><a href="{{route('estudiante.index',['filtro' => 'id'])}}">Estudiantes</a></li>
    </ul>
@endsection
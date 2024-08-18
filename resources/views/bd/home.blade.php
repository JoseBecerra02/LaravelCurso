@extends('../layouts.frontend')

@section('content')
    <h1>Bd Mysql</h1>
    <ul>
        <li><a href="{{route('bd_profesores',['filtro' => 'id'])}}">Profesores</a></li>
        <li><a href="{{route('bd_clases',['filtro' => 'id'])}}">Cursos</a></li>
        <li><a href="{{route('bd_estudiantes',['filtro' => 'id'])}}">Estudiantes</a></li>
    </ul>
@endsection
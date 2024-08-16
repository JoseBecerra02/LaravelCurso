@extends('../layouts.frontend')

@section('content')
    <h1>Formularios</h1>
    <ul>
        <li><a href="{{ route('formularios_simple') }}">Simple</a></li>
        <li><a href="">Flash</a></li>
        <li><a href="">FlasUpload</a></li>
    </ul>
@endsection
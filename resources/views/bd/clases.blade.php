@extends('../layouts.frontend')

@section('content')
    <h1>Clases</h1>
    <x-flash />
    <p class="d-flex justify-content-end">
        <a href="{{route('bd_clases_add')}}" class="btn btn-success"><i class="fas fa-check"></i> Crear</a>
    </p>
    <div class="table-responsive">
        <table class="table table-bordered  table-striped table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Profesor</th>
                    <th>Jornada</th>
                    <th>Estudiantes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clases as $clase)
                    <tr>
                        <td>{{$clase->id}}</td>
                        <td>{{$clase->nombre}}</td>
                        <td>{{$clase->profesor->nombre}}</td>
                        <td>{{$clase->jornada}}</td>
                        <td>{{$clase->Estudiantes}}</td>
                        
                    </tr>
                @endforeach
            </tbody>
    </div>
@endsection
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
                    <th><a href="{{route('bd_clases',['filtro' => 'id'])}}">Id</a></th>
                    <th><a href="{{route('bd_clases',['filtro' => 'nombre'])}}">Nombre</a></th>
                    <th><a href="{{route('bd_clases',['filtro' => 'profesor_id'])}}">Profesor</a></th>
                    <th><a href="{{route('bd_clases',['filtro' => 'jornada'])}}">Jornada</a></th>
                    <th><a href="{{route('bd_clases',['filtro' => 'Estudiantes'])}}">Estudiantes</a></th>
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
                        <td>
                            <a href="{{route('bd_clases_edit',['id'=>$clase->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="javascript:void(0);" onclick="confirmaAlert('Realmente desea eliminarlo?','{{route('bd_clases_delete', ['id'=>$clase->id])}}')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </div>
@endsection
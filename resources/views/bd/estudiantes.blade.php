@extends('../layouts.frontend')

@section('content')
    <h1>Estudiantes</h1>
    <x-flash />
    <p class="d-flex justify-content-end">
        <a href="{{route('bd_estudiantes_add')}}" class="btn btn-success"><i class="fas fa-check"></i> Crear</a>
    </p>
    <div class="table-responsive">
        <table class="table table-bordered  table-striped table-hover">
            <thead>
                <tr>
                    <th><a href="{{route('bd_estudiantes',['filtro' => 'id'])}}">Id</a></th>
                    <th><a href="{{route('bd_estudiantes',['filtro' => 'nombre'])}}">Nombre</a></th>
                    <th><a href="{{route('bd_estudiantes',['filtro' => 'edad'])}}">Edad</a></th>
                    <th><a href="{{route('bd_estudiantes',['filtro' => 'documento'])}}">Documento</a></th>
                    <th><a href="{{route('bd_estudiantes',['filtro' => 'ingreso'])}}">Ingreso</a></th>
                    <th><a href="{{route('bd_estudiantes',['filtro' => 'clase_id'])}}">Clase</a></th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estudiantes as $estudiante)
                    <tr>
                        <td>{{$estudiante->id}}</td>
                        <td>{{$estudiante->nombre}}</td>
                        <td>{{$estudiante->edad}}</td>
                        <td>{{$estudiante->documento}}</td>
                        <td>{{$estudiante->ingreso}}</td>
                        <td>{{$estudiante->clase->nombre}}</td>
                        <td>
                            <a href="{{route('bd_estudiantes_edit',['id'=>$estudiante->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="javascript:void(0);" onclick="confirmaAlert('Realmente desea eliminarlo?','{{route('bd_estudiantes_delete', ['id'=>$estudiante->id])}}')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </div>
@endsection
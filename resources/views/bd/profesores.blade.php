@extends('../layouts.frontend')

@section('content')
    <h1>Profesores</h1>
    <x-flash />
    <p class="d-flex justify-content-end">
        <a href="{{route('bd_profesores_add')}}" class="btn btn-success"><i class="fas fa-check"></i> Crear</a>
    </p>
    <div class="table-responsive">
        <table class="table table-bordered  table-striped table-hover">
            <thead>
                <tr>
                    <th><a href="{{route('bd_profesores',['filtro' => 'id'])}}">Id</a></th>
                    <th><a href="{{route('bd_profesores',['filtro' => 'nombre'])}}">Nombre</a></th>
                    <th><a href="{{route('bd_profesores',['filtro' => 'edad'])}}">Edad</a></th>
                    <th><a href="{{route('bd_profesores',['filtro' => 'documento'])}}">Documento</a></th>
                    <th><a href="{{route('bd_profesores',['filtro' => 'titulo'])}}">Titulo</a></th>
                    <th><a href="{{route('bd_profesores',['filtro' => 'vinculacion'])}}">Vinculacion</a></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profesores as $profesor)
                    <tr>
                        <td>{{$profesor->id}}</td>
                        <td>{{$profesor->nombre}}</td>
                        <td>{{$profesor->edad}}</td>
                        <td>{{$profesor->documento}}</td>
                        <td>{{$profesor->titulo}}</td>
                        <td>{{$profesor->vinculacion}}</td>
                        <td>
                            <a href="{{route('bd_profesores_edit',['id'=>$profesor->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="javascript:void(0);" onclick="confirmaAlert('Realmente desea eliminarlo?','{{route('bd_profesores_delete', ['id'=>$profesor->id])}}')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </div>
@endsection
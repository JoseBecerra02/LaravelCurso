@extends('../layouts.frontend')

@section('content')
<h1 class="text-center py-3" style="background-color: #ffebcd ; border-radius: 5px; font-family: 'Roboto', sans-serif;">Profesores</h1>

    <x-flash />
    <p class="d-flex justify-content-end">
        @if (session('perfil_id') == 1)
            <a href="{{route('profesor.create')}}" class="btn btn-success"><i class="fas fa-check"></i> Crear</a>
        @endif
        {{-- <a href="{{route('profesor.create')}}" class="btn btn-success"><i class="fas fa-check"></i> Crear</a> --}}
    </p>
    <div class="table-responsive">
        <table class="table table-bordered  table-striped table-hover">
            <thead>
                <tr>
                    <th><a href="{{route('profesor.index',['filtro' => 'id'])}}">Id</a></th>
                    <th><a href="{{route('profesor.index',['filtro' => 'nombre'])}}">Nombre</a></th>
                    <th><a href="{{route('profesor.index',['filtro' => 'edad'])}}">Edad</a></th>
                    <th><a href="{{route('profesor.index',['filtro' => 'documento'])}}">Documento</a></th>
                    <th><a href="{{route('profesor.index',['filtro' => 'titulo'])}}">Titulo</a></th>
                    <th><a href="{{route('profesor.index',['filtro' => 'vinculacion'])}}">Vinculacion</a></th>
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
                            <a href="{{route('profesor.edit',['id'=>$profesor->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <form action="{{route('profesor.destroy', ['id'=>$profesor->id])}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                            {{-- <a href="javascript:void(0);" onclick="confirmaAlert('Realmente desea eliminarlo?','{{route('profesor.destroy', ['id'=>$profesor->id])}}')" class="btn btn-danger"><i class="fas fa-trash"></i></a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </div>
@endsection
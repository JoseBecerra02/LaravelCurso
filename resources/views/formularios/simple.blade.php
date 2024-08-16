@extends('../layouts.frontend')

@section('content')
    <h1>Simple</h1>
    <x-flash/>
    <form action="{{ route('formularios_simple_post') }}" method="post" name="form">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}">
        </div>
        <div class="form-group">
            <label for="nombre">Email</label>
            <input type="text" name="correo" id="correo" class="form-control" value="{{ old('correo') }}">
        </div>
        <div class="form-group">
            <label for="nombre">Descripcion</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
        </div>
        <div class="form-group">
            <label for="nombre">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <hr>
        {{ csrf_field() }}
        <input type="submit" value="Enviar" class="btn btn-primary">
    </form>
@endsection

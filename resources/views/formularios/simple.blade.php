@extends('../layouts.frontend')

@section('content')
    <h1>Simple</h1>
    <x-flash/>
    <form action="{{ route('formularios_simple_post') }}" method="post" name="form">
        <div class="form-group">
            <label for="nombre">País</label>
            <select name="pais" id="pais" class="form-control" >
                <option value="0">Seleccione...</option>
                @foreach($paises as $pais)
                    <option value="{{$pais['id']}}" {{ old('pais') == $pais['id'] ? 'selected' : '' }}>{{ $pais['nombre'] }}</option>
                @endforeach
            </select>
        </div>
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
        <div class="form-group">
            <label for="intereses">Intereses</label>
            <div class="form-check">
                @foreach ($intereses as $interes)
                <input type="checkbox" name="interes_{{$loop->index}}" id="interes_{{$loop->index}}" class="form-check-label" value="{{$interes['id']}}">
                <label for="interes_{{$loop->index}}" class="form-check-label">{{ $interes['nombre'] }}</label>
                <br>
                @endforeach
            </div>
        </div>
        <hr>
        {{ csrf_field() }}
        <input type="submit" value="Enviar" class="btn btn-primary">
    </form>
@endsection

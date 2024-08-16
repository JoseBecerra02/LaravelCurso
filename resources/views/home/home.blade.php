<h1>hola desde mi vista blade</h1>
<hr>
<h3>Texto = {{ $texto }}</h3>
<hr>
<h3>Declarar variables</h3>
@php
    $contador = 1;
@endphp
<h4>Contador = {{ $contador }}</h4>
<hr>
<h3>Condicional 1</h3>
@if ($numero == 13)
    <h4>Numero 13</h4>
@else
    <h4>Numero diferente de 13</h4>
@endif
<hr>
<h3>Condicional 2</h3>
@switch($numero)
    @case(11)
        <h4>Numero 11</h4>
    @break

    @case(12)
        <h4>Numero 12</h4>
    @break

    @case(13)
        <h4>Numero 13</h4>
    @break

    @default
        <h4>Numero diferente de 11, 12 y 13</h4>
@endswitch
<hr>
<h3>Condicional 3</h3>
<h4>{{ $numero == 12 ? 'es 12' : 'no es 12' }}</h4>
<hr>
<h3>Ciclo for</h3>
<ul>
    @for ($i = 0; $i < 5; $i++)
        <li>{{ $i }}</li>
    @endfor
</ul>
<hr>
<h3>Ciclo foreach</h3>
@foreach ([1, 23, 4, 233, 76, 6543] as $elemento)
    <h4>{{ $elemento }}</h4>
@endforeach
<hr>
@include('home.incluido')
<hr>
<x-componente : mensaje="$texto" />
<hr>
<h3>Enlaces</h3>
<ul>
    <li><a href="{{ route('home_hola') }}">Home</a></li>
    <li><a href="{{ route('home_parametros', ['id' => 1, 'slug' => 'my-slug']) }}">Parametro</a></li>
</ul>

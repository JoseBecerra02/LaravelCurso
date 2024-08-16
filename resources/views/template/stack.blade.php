@extends('../layouts.frontend')

@section('content')
    <h1>Ejemplo de stack</h1>
    <a href="{{ asset('images/404.png') }}" class="fancybox">
        <img src="{{ asset('images/404.png') }}"  width="100" height="100">
    </a>
@endsection
@push('css')
<link href="{{ asset('fancybox/jquery.fancybox.css') }}" rel="stylesheet"> 
    
@endpush
@push('js')
<script src="{{ asset('fancybox/jquery.fancybox.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
@endpush
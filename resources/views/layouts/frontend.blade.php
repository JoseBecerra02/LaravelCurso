<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Curso Laravel</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }
    </style>

    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet" />
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/jquery.alerts.min.css') }}" rel="stylesheet" />    
    <link rel="stylesheet" type="text/css" href="{{asset('fontawesome/css/all.css') }}"  />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

    @stack('css')
</head>

<body>
    <div class="container">
        <header class="border-bottom lh-1 py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-body-emphasis text-decoration-none"
                        href="{{ route('home_inicio') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" width="50" height="50">
                    </a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="link-secondary" href="#" aria-label="Search">
                        
                    </a>
                    <a class="btn btn-sm btn-outline-secondary" href=""> ({{session('perfil')}})</a>
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-3 border-bottom">
            <nav class="nav nav-underline justify-content-between">

                @if (Auth::check())
                    <a class="nav-item nav-link link-body-emphasis active" href="{{route('estudiante.index',['filtro' => 'id'])}}">Estudiantes</a>
                    <a class="nav-item nav-link link-body-emphasis" href="{{route('clase.index',['filtro' => 'id'])}}">Clases</a>
                    <a class="nav-item nav-link link-body-emphasis" href="{{route('profesor.index',['filtro' => 'id'])}}">Profesores</a>
                    <a class="nav-item nav-link link-body-emphasis" href="javascript:void(0);" onclick="confirmaAlert('Realmente desea cerrar la sesion?','{{route('acceso_logout')}}');">Logout</a>
                @else
                    <a class="nav-item nav-link link-body-emphasis" href="{{route('acceso_registro')}}">Registro</a>
                    <a class="nav-item nav-link link-body-emphasis" href="{{route('acceso_login')}}">Login</a>  
                @endif       

            </nav>
        </div>
    </div>
    <main class="container">
        <!--Contenido-->
        @yield('content')
        <!--/Contenido-->
    </main>
    <footer class="py-5 text-center text-body-secondary bg-body-tertiary">
        <p>Todos los derechos reservados.</p>
    </footer>
    <script src="{{asset('js/jquery-2.0.0.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/jquery.alerts.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/funciones.js')}}?id={{ csrf_token() }}"></script>
    @stack('js')
</body>


</html>

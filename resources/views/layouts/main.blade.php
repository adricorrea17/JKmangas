<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title') - Proyecto</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <header class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container-fluid">
                <div>
                    <a class="navbar-brand" href="{{route('inicio')}}">
                        <img src="{{ url('img/logo.png')}}" alt="El logo de jkmangas">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Abrir/cerrar menú de navegación">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <nav class="collapse navbar-collapse bg-primary flex-row-reverse" id="navbar">
                    <ul class="navbar-nav d-flex align-items-center gap-3">
                        <li class="nav-item">
                            <a class="nav-link text-light font" href="{{ route('inicio')}}">Home</a>
                        </li>
                        @if(!Auth::check() || Auth::user()->ban != 1)
                        <li class="nav-item">
                            <a class="nav-link text-light font " href="{{ route('estrenos')}}">Mangas</a>
                        </li>
                        @endif
                        @if(Auth::check() && Auth::user()->usuarios_rol_id == 1)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administracion
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.dashboard')}}">Dashboard</a>
                                <a class="dropdown-item" href="{{ route('admin.mangas.lista')}}">Mangas</a>
                                <a class="dropdown-item" href="{{ route('admin.mangas.usuarios')}}">Usuarios</a>
                                <a class="dropdown-item" href="{{ route('admin.pagos')}}">Pagos</a>
                            </div>
                        </li>
                        
                        @endif

                        @if(Auth::check() && Auth::user()->usuarios_rol_id <= 3 ) <li class="nav-item">
                            <a class="nav-link text-light font " href="{{ route('auth.perfil') }}">Perfil</a>
                            </li>
                            <li class="nav-item ">
                                <form action="{{ route('auth.logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn cerrar font">Cerrar sesion ({{ Auth::user()->nombre_usuario }})</button>
                                </form>
                            </li>
                            @elseif(!Auth::check())
                            <li class="nav-item rounded">
                                <a class="nav-link text-light font " href="{{ route('auth.login.form')}}">Iniciar sesion</a>
                            </li>
                            <li class="nav-item rounded">
                                <a class="nav-link text-light font " href="{{ route('auth.register.form')}}">Registrar</a>
                            </li>
                            @endif
                    </ul>
                </nav>
            </div>
        </header>

        <main class="main">
            @if(Session::has('status.message'))
            <div class="alert alert-{{ Session::get('status.type') ?? 'info' }}">{!! Session::get('status.message') !!}</div>
            @endif
            @yield('main')
        </main>

        <footer class="d-flex flex-column flex-sm-row justify-content-around bg-dark align-items-center py-3">
            <p class="col-md-4 mb-0 text-light">© Portales y Comercios Electronico</p>

            <div>
                <a class="navbar-brand" href="{{route('inicio')}}">
                    <img src="{{ url('img/logo.png')}}" alt="El logo de jkmangas">
                </a>
            </div>
        </footer>
    </div>
</body>
<script>
    // Función para ocultar el alert después de un tiempo determinado
    function hideAlert() {
        var alertElement = document.querySelector(".alert");
        if (alertElement) {

            alertElement.classList.add("fade-out");
            setTimeout(function() {
                alertElement.style.display = "none";
            }, 2000);
        }
    }
    setTimeout(hideAlert, 3000);

    // Inicializa AOS
    AOS.init();
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>




</html>
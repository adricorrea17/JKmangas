<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title') - Proyecto</title>

    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('css/style.css')}}">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container-fluid">
                <div>
                    <a class="navbar-brand" href="{{route('inicio')}}">
                        <img src="{{ url('img/logo.png')}}" alt="El logo de jkmangas">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Abrir/cerrar menú de navegación">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbar">
                    <ul class="navbar-nav d-flex align-items-center gap-3">
                        <li class="nav-item">
                            <a class="nav-link text-light font fs-5" href="{{ route('inicio')}}">Home</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light font fs-5" href="{{ route('estrenos')}}">Mangas</a>
                        </li>
                        @if(Auth::check() && Auth::user()->rol == 'admin')
                        <li class="nav-item">
                            <a class="nav-link text-light font fs-5" href="{{ route('admin.mangas.lista')}}">Panel de administracion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light font fs-5" href="{{ route('admin.mangas.usuarios')}}">Usuarios</a>
                        </li>
                        <li class="nav-item ">
                            <form action="{{ route('auth.logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn text-light font fs-5">Cerrar sesion ({{ Auth::user()->nombre_usuario }})</button>
                            </form>
                        </li>
                        @elseif(Auth::check() && Auth::user()->rol == 'UserComun')
                        <li class="nav-item ">
                            <form action="{{ route('auth.logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn text-light font fs-5">Cerrar sesion ({{ Auth::user()->nombre_usuario }})</button>
                            </form>
                        </li>
                        @else
                        <li class="nav-item rounded">
                            <a class="nav-link text-light font fs-5" href="{{ route('auth.login.form')}}">Iniciar sesion</a>
                        </li>
                        <li class="nav-item rounded">
                            <a class="nav-link text-light font fs-5" href="{{ route('auth.register.form')}}">Registrar</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="height">
            @if(Session::has('status.message'))
            <div class="alert alert-{{ Session::get('status.type') ?? 'info' }}">{!! Session::get('status.message') !!}</div>
            @endif
            @yield('main')
        </main>

        <footer class="d-flex justify-content-around bg-dark align-items-center py-3">
            <p class="col-md-4 mb-0 text-light">© Portales y Comercios Electronico</p>

            <div>
                <a class="navbar-brand" href="{{route('inicio')}}">
                    <img src="{{ url('img/logo.png')}}" alt="El logo de jkmangas">
                </a>
            </div>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-light">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-light">About</a></li>
            </ul>
        </footer>
    </div>
</body>

</html>
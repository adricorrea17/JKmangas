<?php

/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\UsuariosPlans[] $UsuariosPlans */
?>
@extends('layouts.main')
@section('main')
@section('title') HOME @endsection
<section class="gradiant">
    <div class="hero container d-flex flex-md-row">
        <div class="letras-japonesas" data-aos="fade-left" data-aos-delay="3000" data-aos-duration="1000">
            <div>マ</div>
            <div>ン</div>
            <div>ガ</div>
            <div>マ</div>
            <div>ン</div>
            <div>ガ</div>
        </div>
        <div class="col-12 col-md-6 d-flex">

            <marquee id="marqueeMangas" direction="up" class="marquee" loop scrollamount="18">
                <div class="marquee-grid">
                    @for($z=0; $z<3; $z++) @foreach($mangas as $i=> $manga)
                        @if($manga->portada != null && file_exists(public_path('img/' . $manga->portada)))
                        <div class="item">
                            <img src="{{ url('img/' . $manga->portada) }}" alt="Portada del manga {{$manga->titulo}}">
                        </div>
                        @endif
                        @endforeach
                        @endfor
                </div>
            </marquee>
        </div>
        <div class="textColumn text-center text-md-start text-light radius gap-3 d-flex flex-column justify-content-center col-12 col-md-6 p-2 py-5 p-lg-5 ">
            <h1 class="font fw-bold">JKmangas</h1>
            <p class="font fs-3">La página en la cual podrás enterarte de los próximos estrenos y leer tus mangas favoritos</p>

            @if(!Auth::check())
            <p class="font fs-5">Crea una cuenta de JKmangas para poder leer tus mangas favoritos</p>

            <form action="{{ route('auth.register.form') }}" method="get">

                <div class="input-group w-75">
                    <input type="text" name="email" placeholder="e-mail" class="form-control">
                    <button class="btn btn-primary" type="submit">Crear cuenta</button>
                </div>
            </form>
            @else
            <p class="font fs-5">Puedes leer muchos de nuestros mangas desde la comodidad de tu hogar.</p>
            <a href="{{ route('estrenos')}}" class="mx-auto mx-md-0 text-center font btn-secondary col-6 py-1 radius text-decoration-none">Encuentra tus mangas favoritos</a>
            @endif
        </div>
    </div>
    <script>
        var marquee = document.getElementById("marqueeMangas");
        if (window.innerWidth < 768) {
            // Si la ventana es menor a 768px de ancho (típicamente dispositivos móviles), reducir la velocidad
            marquee.setAttribute("scrollamount", "10");
        } else {
            // En caso contrario, dejar la velocidad original
            marquee.setAttribute("scrollamount", "18");
        }
    </script>
</section>



<section class="bg-purple p-5 gap-3 text-light">
    <div class="d-flex col-12 col-sm-10 col-xl-8 align-items-center mx-auto flex-column flex-md-row py-5">
        <picture data-aos="zoom-in" data-aos-delay="100">
            <img class="img-fluid" src="img/tanjiro.png" alt="Tres mangas que podras encontrar en nuestra pagina">
        </picture>
        <div class="d-flex flex-column ml-5" data-aos="zoom-in" data-aos-delay="400">
            <p class="text-center text-md-start fs-2">Podrás encontrar una extensa variedad de tus mangas favoritos</p>
            <a href="{{ route('estrenos')}}" class="text-center btn-primary radius text-decoration-none col-10 col-md-8 col-lg-6 p-1 ">Ver mangas</a>
        </div>

    </div>
</section>
<section class="bg-purple py-5">
    <div class="d-flex col-11 col-sm-10 col-xl-8 align-items-center mx-auto py-5 flex-column flex-md-row-reverse">
        <picture data-aos="zoom-in" data-aos-delay="400">
            <img class="img-fluid" src="img/naruto.png" alt="Tres mangas que podras encontrar en nuestra pagina">
        </picture>
        <div class="d-flex flex-column naruto" data-aos="zoom-in" data-aos-delay="400">
            <p class="text-center text-md-start w-75 fs-2 text-light">También puedes visitar nuestra página donde encontrarás tus animes favoritos</p>
            <a href="#" class="text-center btn-primary radius text-decoration-none col-10 col-md-8 col-lg-6 p-1 ">Visitanos en JKanime</a>
        </div>
    </div>
</section>

<section class="pb-5 gradiant2">
    <h2 class="pt-5 text-light col-10 text-center mx-auto font">Elige el plan adecuado para ti</h2>

    @include('components.planes')
</section>

@endsection
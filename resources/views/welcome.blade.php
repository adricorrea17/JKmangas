<?php

/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\UsuariosPlans[] $UsuariosPlans */
?>
@extends('layouts.main')
@section('main')
@section('title') HOME @endsection

<section class="d-flex flex-column flex-md-row gradiant">
    <marquee behavior="scroll" direction="up" height="750px" class="mx-auto d-flex flex-column align-items-center w-75">
        <div class="d-flex flex-column gap-4">
            <img class="img-fluid" src="img/banner-mangas.png" alt="">
        </div>
    </marquee>
    <div data-aos="fade-down" data-aos-delay="400" class="mx-auto text-center text-md-start text-light radius gap-3 d-flex flex-column justify-content-center w-100 w-md-75 p-2 py-5 p-md-5 ">
        <h1 class="font">JKmangas</h1>
        <p class="font fs-2">La página en la cual podrás enterarte de los próximos estrenos y leer tus mangas favoritos</p>

        @if(!Auth::check())
        <p class="font">Crea una cuenta de JKmangas para poder leer tus mangas favoritos</p>
        <a href="{{ route('auth.register.form')}}" class="mx-auto mx-md-0 text-center font btn-primary col-6 py-1 radius text-decoration-none text-dark">Crear cuenta</a>
        @else
        <p class="font">Puedes leer muchos de nuestros mangas desde la comodidad de tu hogar.</p>
        <a href="{{ route('estrenos')}}" class="mx-auto mx-md-0 text-center font btn-primary col-6 py-1 radius text-decoration-none text-dark">Ver Mangas</a>
        @endif
    </div>
</section>



<section data-aos="fade-in" class="bg-dark p-5 gap-3 text-light ">
    <div class="d-flex col-8 align-items-center mx-auto flex-column flex-md-row">
        <picture data-aos="zoom-in" data-aos-delay="400">
            <img class="img-fluid" src="img/mangas.png" alt="Tres mangas que podras encontrar en nuestra pagina">
        </picture>
        <div class="d-flex flex-column ml-5" data-aos="zoom-in" data-aos-delay="400">
            <p class="text-center text-md-start fs-2">Podrás encontrar una extensa variedad de tus mangas favotiros</p>
            <a href="" class="text-center btn-primary radius text-decoration-none text-dark w-50 p-1 fw-bold">Encuentra tus mangas favoritos</a>
        </div>

    </div>
</section>
<section class="gradiant pt-5">
    <div class="d-flex col-8 align-items-center mx-auto flex-column flex-md-row pt-5">
        <div class="d-flex flex-column" data-aos="zoom-in" data-aos-delay="400">
            <p class="text-center text-md-start fs-2 col-10 text-light">Tambien puedes visitar nuestra pagina donde encontraras tus animes favoritos</p>
            <a href="#" class="text-center btn-primary radius text-decoration-none text-dark w-50 p-1 fw-bold">Visitanos en JKanime</a>
        </div>
        <picture data-aos="zoom-in" data-aos-delay="400">
            <img class="img-fluid" src="img/naruto.png" alt="Tres mangas que podras encontrar en nuestra pagina">
        </picture>
    </div>
</section>

<section class="mb-6 mt-6">
    <h2 class="pt-5 text-light text-center font">Elige el plan adecuado para ti</h2>

    @include('components.planes')
</section>
@endsection
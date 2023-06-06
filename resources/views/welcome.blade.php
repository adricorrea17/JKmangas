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
        <p class="font">Crea una cuenta de JKmangas para poder leer tus mangas favoritos</p>
        <a href="{{ route('auth.register.form')}}" class="mx-auto mx-md-0 text-center font btn-primary col-6 py-1 radius text-decoration-none text-dark">crear cuenta</a>
    </div>
</section>



<!-- <section data-aos="fade-in" class="bg-dark p-5 gap-3 text-light ">
    <div class="d-flex col-8 align-items-center gap-5 mx-auto flex-column flex-md-row">
        <picture data-aos="zoom-in" data-aos-delay="400">
            <img class="img-fluid" src="img/mangas.png" alt="Tres mangas que podras encontrar en nuestra pagina">
        </picture>
        <p class="text-center text-md-start fs-1 font">Podrás encontrar la mayor variedad de mangas</p>
    </div>
</section>
<section>
    <div class="mt-5 col-10 mx-auto text-center">

        <p data-aos="zoom-in" class=" fs-1 p-5 bg-dark radius text-light font">Los mejores mangas a los mejores precios</p>

    </div>
</section> -->

<section class="bg-dark mb-6 mt-6">
    <h2 class="pt-5 text-light text-center font">Elige el plan adecuado para ti</h2>

    @include('components.planes')
</section>
@endsection
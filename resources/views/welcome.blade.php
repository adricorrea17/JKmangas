<?php

/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\UsuariosPlans[] $UsuariosPlans */
?>
@extends('layouts.main')
@section('main')
@section('title') HOME @endsection

<div>
    <picture class="w-100 position-relative">
        <img class="img-fluid mt-0" src="img/banner.jpg" alt="Imagen banner de JKmangas de Luffy y Goku">
    </picture>
    <div class="col-5 bg-dark text-light d-flex flex-column align-items-center text-center p-3 radius gap-3 position-absolute">
        <h1 class="font">JKmangas</h1>
        <p class="font fs-2">La página en la cual podrás enterarte de los próximos estrenos y leer tus mangas favoritos</p>
        <p class="font">Crea una cuenta de JKmangas para poder leer tus mangas favoritos</p>
        <a href="{{ route('auth.register.form')}}" class="font btn-primary col-6 py-1 radius text-decoration-none">crear cuenta</a>
    </div>
</div>

<section class=" mt-5 bg-dark p-5 gap-3 text-light ">
    <div class="d-flex col-8 align-items-center gap-5 mx-auto">
        <picture>
            <img src="img/mangas.png" alt="Tres mangas que podras encontrar en nuestra pagina">
        </picture>
        <p class="fs-1 font">Podrás encontrar la mayor variedad de mangas</p>
    </div>
</section>
<section>
    <div class="mt-5 col-10 mx-auto text-center">
        <picture>
            <img class="img-fluid mt-0" src="img/todoroki.png" alt="tres personajes de mangas, entre ellos todoroki y kaneki">
        </picture>

        <p class=" fs-1 p-5 bg-dark radius text-light font">Los mejores mangas a los mejores precios</p>

    </div>
</section>


<section class="bg-dark mb-6 mt-6">
    <h2 class="pt-5 text-light text-center font">Elige el plan adecuado para ti</h2>

    @include('components.planes')
</section>


@endsection
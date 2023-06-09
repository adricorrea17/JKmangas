<?php

/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\UsuariosPlans[] $UsuariosPlans */
?>
@extends('layouts.main')
@section('main')
@section('title') HOME @endsection

<section class="gradiant">
    <div class="hero container d-flex flex-column flex-md-row">
        <div class="letras-japonesas" data-aos="fade-left" data-aos-delay="3000" data-aos-duration="1000">
            <div>マ</div>
            <div>ン</div>
            <div>ガ</div>
            <div>マ</div>
            <div>ン</div>
            <div>ガ</div>
        </div>
        <div class="col-md-6 d-flex">

            <marquee direction="up" class="marquee" loop scrollamount="18" >
                <div class="marquee-grid">
                    @for($z=0; $z<3; $z++)
                        @foreach($mangas as $i => $manga)
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
        <div data-aos="fade-right" data-aos-delay="1000" class="text-center text-md-start text-light radius gap-3 d-flex flex-column justify-content-center col-md-6 p-2 py-5 p-md-5 ">
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
            <a href="{{ route('estrenos')}}" class="mx-auto mx-md-0 text-center font btn-primary col-6 py-1 radius text-decoration-none text-dark">Encuentra tus mangas favoritos</a>
            @endif
        </div>
    </div>
</section>



<section data-aos="fade-in" class="bg-dark p-5 gap-3 text-light">
    <div class="d-flex col-8 align-items-center mx-auto flex-column flex-md-row py-5">
        <picture data-aos="zoom-in" data-aos-delay="100">
            <img class="img-fluid" src="img/mangas.png" alt="Tres mangas que podras encontrar en nuestra pagina">
        </picture>
        <div class="d-flex flex-column ml-5" data-aos="zoom-in" data-aos-delay="400">
            <p class="text-center text-md-start fs-2">Podrás encontrar una extensa variedad de tus mangas favoritos</p>
            <a href="{{ route('estrenos')}}" class="text-center btn-primary radius text-decoration-none text-dark w-50 p-1 ">Ver mangas</a>
        </div>

    </div>
</section>
<section data-aos="fade-in" class="bg-purple py-5">
    <div class="d-flex col-8 align-items-center mx-auto py-5 flex-column flex-md-row-reverse">
        <picture data-aos="zoom-in" data-aos-delay="400">
            <img class="img-fluid" src="img/naruto.png" alt="Tres mangas que podras encontrar en nuestra pagina">
        </picture>
        <div class="d-flex flex-column" data-aos="zoom-in" data-aos-delay="400">
            <p class="text-center text-md-start fs-2 col-10 text-light">También puedes visitar nuestra página donde encontrarás tus animes favoritos</p>
            <a href="#" class="text-center btn-primary radius text-decoration-none text-dark w-50 p-1 ">Visitanos en JKanime</a>
        </div>
    </div>
</section>

<section class="pb-5 bg-dark ">
    <h2 class="pt-5 text-light text-center font">Elige el plan adecuado para ti</h2>

    @include('components.planes')
</section>
@endsection
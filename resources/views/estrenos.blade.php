<?php

/** @var \App\Models\Manga $manga */

?>
@extends('layouts.main')
@section('main')
@section('title') Estrenos @endsection
<section class="py-5 gradiant">
  <h1 class="font text-center text-light mb-5">Nuestros Mangas</h1>
  <div class="container-fluid">
    <div class="d-flex text-center justify-content-sm-evenly justify-content-lg-around gap-4 row">
    @include('components.buscar')
      @foreach($mangas as $manga)
      <article data-aos="fade-down" class="manga card col-10 col-md-5 col-lg-2 mx-auto mx-md-0 p-0">
        @if($manga->portada != null && file_exists(public_path('img/' . $manga->portada)))
        <img class="img-fluid " src="{{ url('img/' . $manga->portada) }}" alt="Portada del manga {{$manga->titulo}}">
        @elseif($manga->portada == null)
        <img class="img-fluid " src="img/default.png" alt="Portada del manga {{$manga->titulo}}">
        @endif
        <div class="overlay">
          <h3 class="h1 font titulo-manga">{{ $manga->titulo }}</h3>
          <p class="fs-3 font">{{$manga->proximo_tomo}}</p>
          <ul class="d-flex list-unstyled gap-3 mb-1 justify-content-center">
            @forelse($manga->generos as $genero)
            <li class="genero">{{ $genero->nombre }}</li>
            @empty
            <li class=" bg-danger text-dark px-3 rounded fw-bold">Sin genero</li>
            @endforelse
          </ul>
          <a href="{{route('admin.mangas.ver',['id'=> $manga->manga_id] )}}" class="btn-secondary text-decoration-none w-75 mt-3 font radius p-1">Ver</a>

        </div>
      </article>

      @endforeach
    </div>
  </div>
</section>


@endsection
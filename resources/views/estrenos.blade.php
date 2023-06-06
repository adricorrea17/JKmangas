<?php

/** @var \App\Models\Manga $manga */

?>
@extends('layouts.main')
@section('main')
@section('title') Estrenos @endsection
<section class="my-5 ">
  <h1 class="font text-center text-light mb-5">Nuestros Mangas</h1>
  <div class="container-fluid">
    <div class="d-flex text-center justify-content-sm-evenly justify-content-lg-between gap-4 row p-sm-4 ">

      @foreach($mangas as $manga)
      <article data-aos="fade-down" class="manga card col-7 col-md-5 col-lg-2 mx-auto mx-md-0 p-0">
          @if($manga->portada != null && file_exists(public_path('img/' . $manga->portada)))
          <img src="{{ url('img/' . $manga->portada) }}" alt="Portada del manga {{$manga->titulo}}">
          <div class="overlay">
            <h3 class="h1 font">{{$manga->titulo}}</h3>
            <p class="fs-3 font">{{$manga->proximo_tomo}}</p>
            <ul class="d-flex list-unstyled gap-3 mb-1 justify-content-center">
              @forelse($manga->generos as $genero)
              <li class="genero ">
                {{$genero->nombre}}
              </li>
              @empty
              <li class=" bg-danger text-dark px-3 rounded fw-bold">
                Sin genero
              </li>
              @endforelse
            </ul>
            <a href="{{route('admin.mangas.ver',['id'=> $manga->manga_id] )}}" class="btn w-75 mt-3 font radius ">Ver</a>
  
          </div>
        @endif
        </article>

      @endforeach
    </div>
  </div>
</section>
@endsection
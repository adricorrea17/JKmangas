<?php

/** @var \App\Models\Manga $manga */

?>
@extends('layouts.main')
@section('main')
@section('title') Estrenos @endsection
<section class="my-5 ">
  <h1 class="font text-center mb-5">Nuestros Mangas</h1>
  <div class="container-fluid">
    <div class="d-flex row text-center justify-content-around gap-4">

      @foreach($mangas as $manga)
      <div data-aos="fade-down" class="card">
        <picture>
          @if($manga->portada != null && file_exists(public_path('img/' . $manga->portada)))
          <img class="rounded col-12 img-fluid imagen" src="{{ url('img/' . $manga->portada) }}" alt="Portada del manga {{$manga->titulo}}">
        </picture>
        @endif
        <div class="overlay">
          <h3 class="h1 font">{{$manga -> titulo}}</h3>
          <p class="fs-3 font">{{$manga -> proximo_tomo}}</p>
          <ul class="d-flex list-unstyled gap-3 mb-1 justify-content-center">
            @forelse($manga->generos as $genero)
            <li class=" bg-light text-dark px-3 rounded fw-bold fs-5 font">
              {{$genero -> nombre}}
            </li>
            @empty
            <li class=" bg-danger text-dark px-3 rounded fw-bold">
              Sin genero
            </li>
            @endforelse
          </ul>
          <a href="{{route('admin.mangas.ver',['id'=> $manga->manga_id] )}}" class="btn btn-primary w-75 mt-3 font radius">Ver</a>

        </div>
      </div>

      @endforeach
    </div>
  </div>
</section>
@endsection
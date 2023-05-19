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

      <div class="col-12 col-lg-6 col-xl-4 col-xxl-3 mt-1 bg-dark radius h-100 p-4 text-light ">
        <picture>
          @if($manga->portada != null && file_exists(public_path('img/' . $manga->portada)))
          <img class="rounded imagen my-3" src="{{ url('img/' . $manga->portada) }}" alt="Portada del manga {{$manga->titulo}}">
        </picture>
        @endif
        <h2 class="text-light titulo font fs-2 fw-bolder">{{$manga -> titulo}}</h2>
        <p class="fs-5 font"><b class="fs-4 font">Estreno del siguiente tomo: </b> {{$manga -> proximo_tomo}}</p>
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
        <a href="{{route('admin.mangas.ver',['id'=> $manga->manga_id] )}}" class="btn btn-primary w-100 mt-3 font radius">Ver</a>
      </div>

      @endforeach
    </div>
  </div>
</section>
@endsection
<?php

/** @var \App\Models\Manga $manga */

?>
@extends('layouts.main')
@section('main')
@section('title') ADMIN @endsection

<section class="container mt-4">
  <div class="container">
    <h1 class="text-light">Administrador de Mangas</h1>
    <a href="{{ route('admin.mangas.nuevo.form')}}" class="btn btn-primary cargar">Cargar producto</a>
    <div>
      @foreach($mangas as $manga)
      <article class="card bg-dark gap-5 d-flex flex-column flex-md-row p-4 text-light my-3 col-12 mx-auto rounded">
        @if($manga->portada != null && file_exists(public_path('img/' . $manga->portada)))
        <img class="img-fluid mx-auto mx-md-0 col-sm-6 col-md-3 col-xl-2 rounded" src="{{ url('img/' . $manga->portada) }}" alt="Portada del manga {{$manga->titulo}}">
        @elseif($manga->portada == null)
        <img class="img-fluid col-2 rounded" src="{{ url('img/default.png') }}" alt="Portada del manga {{$manga->titulo}}">
        @endif
        <div class="col-lg-9 p-1 d-flex flex-column justify-content-center">
          <div class="d-flex flex-column">
            <h2 class="h1 fw-bold">{{$manga->titulo}}</h2>
            <h3 class="h5 fw-bold">Precio: <label class="fs-6 fw-light">{{$manga->precio}} $ARG</label></h2>
          </div>


          <h3 class="h5 fw-bold">Descripcion: <label class="fs-6 fw-light">{{$manga->descripcion}} $ARG</label></h3>


          <ul class="d-flex list-unstyled gap-3 mb-3">
            @forelse($manga->generos as $genero)
            <li class="bg-light text-dark px-3 rounded fw-bold">
              {{$genero -> nombre}}
            </li>
            @empty
            <li class=" bg-danger text-dark px-3 rounded fw-bold">
              Sin genero
            </li>
            @endforelse
          </ul>
          <h3 class="h5 fw-bold">Mangaka: <label class="fs-6 fw-light">{{$manga->mangaka}}</label></h3>

          <div>
            <a href="{{route('admin.mangas.ver',['id'=> $manga->manga_id] )}}" class="btn btn-primary">Ver</a>
            <a href="{{route('admin.mangas.editar.form',['id'=> $manga->manga_id] )}}" class="btn btn-dark">Editar</a>
            <a href="{{route('admin.mangas.eliminar.form',['id'=> $manga->manga_id] )}}" class="btn btn-danger">Eliminar</a>

          </div>

        </div>



      </article>
      @endforeach
    </div>
  </div>
</section>

</section>


@endsection
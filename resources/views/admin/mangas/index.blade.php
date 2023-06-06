<?php

/** @var \App\Models\Manga $manga */

?>
@extends('layouts.main')
@section('main')
@section('title') ADMIN @endsection
<section class="container mt-4">
  <h1 class="text-light">ADMIN</h1>

  <p class="mb-3">
    <a  href="{{route('admin.mangas.nuevo.form')}}">Agregar un nuevo manga</a>
  </p>




  <table class="w-100 mt-4 table">
    <thead class="bg-dark text-light">
      <tr>
        <th>Titulo</th>
        <th>Descripción</th>
        <th>Tomos</th>
        <th>Siguiente estreno</th>
        <th>Precio</th>
        <th>Mangaka</th>
        <th>Generos</th>
        <th>Acciones</th>
      </tr>
    </thead>
    </tbody>
    @foreach($mangas as $manga)
    <tr>
      <td class="mb-3 text-light">{{$manga -> titulo}}</td>
      <td class="text-light"><b class="fs-5"></b> {{$manga -> descripcion}}</td>
      <td class="text-light"><b class="fs-5"></b> {{$manga -> tomos}}</td>
      <td class="text-light"><b class="fs-5"></b> {{$manga -> proximo_tomo}}</td>
      <td class="text-light"><b class="fs-5"></b> ${{$manga -> precio}}</td>
      <td class="text-light"><b class="fs-5"></b> {{$manga -> mangaka}}</td>
      <td class="text-light">
        @forelse($manga->generos as $genero)
        {{$genero -> nombre}}
        @empty
        Sin genero
        @endforelse
      </td>
      <td>
        <div class="d-flex gap-1">
          <a href="{{route('admin.mangas.ver',['id'=> $manga->manga_id] )}}" class="btn btn-primary text-dark">Ver</a>
          <a href="{{route('admin.mangas.editar.form',['id'=> $manga->manga_id] )}}" class="btn btn-dark">Editar</a>
          <a href="{{route('admin.mangas.eliminar.form',['id'=> $manga->manga_id] )}}" class="btn btn-danger">Eliminar</a>
        </div>

      </td>
    </tr>
    @endforeach
    </tbody>

  </table>
</section>


@endsection
<?php

/** @var \App\Models\Manga $manga */
?>
@extends('layouts.main')
@section('main')
@section('title'){{$manga -> titulo}} @endsection
<section class=" container margen-vista bg-dark px-2 py-3 text-light d-flex flex-column  my-4">
    <div class="w-100 mx-auto d-flex gap-5 p-3 mangaid flex-column flex-md-row">
        <div class="mx-auto">
            @if($manga->portada != null && file_exists(public_path('img/' . $manga->portada)))
            <img class="rounded" src="{{ url('img/' . $manga->portada) }}" alt="Portada del manga {{$manga->titulo}}"></img>
            @elseif($manga->portada == null)
            <img class="rounded" src="./../../../public/img/default.png" alt="Portada del manga {{$manga->titulo}}"></img>
            @endif
        </div>
        <div class="d-flex flex-column justify-content-center w-75">
            <h1 class="mb-3 fw-bold">{{$manga -> titulo}}</h1>
            <p class="fs-5"><b class="fs-4">Descripcion:</b> {{$manga -> descripcion}}</p>
            <p class="fs-5"><b class="fs-4">Tomos:</b> {{$manga -> tomos}}</p>
            <p class="fs-5"><b class="fs-4">Estreno del siguiente tomo:</b> {{$manga -> proximo_tomo}}</p>
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
            <p class="fs-5"><b class="fs-4">Precio del manga fisico:</b> ${{$manga -> precio}}</p>
            <p class="fs-5"><b class="fs-4">Mangaka:</b> {{$manga -> mangaka}}</p>
            <button class="btn btn-primary font text-dark">Leer</button>

        </div>
    </div>
</section>

@endsection
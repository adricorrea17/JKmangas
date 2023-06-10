<?php

/** @var \App\Models\Manga $manga */
?>
@extends('layouts.main')
@section('main')
@section('title') Eliminar {{$manga -> titulo}} @endsection



<section class="container p-4">
    <div class="radius bg-dark p-5 text-light mx-auto">
        <h1 class="mb-5">Desea eliminar este Manga?</h1>
        <div class="w-100 mx-auto d-flex gap-5 p-3 mangaid flex-column flex-lg-row">
            <div class="mx-auto col-3">
                @if($manga->portada != null && file_exists(public_path('img/' . $manga->portada)))
                <img class="img-fluid w-100" src="{{ url('img/' . $manga->portada) }}" alt="Portada del manga {{$manga->titulo}}">
                @elseif($manga->portada == null)
                <img class="img-fluid w-100" src="../../../../public/img/default.png" alt="Portada del manga {{$manga->titulo}}">
                @endif
            </div>
            <div class="d-flex flex-column justify-content-center">
                <h1 class="mb-3">{{$manga -> titulo}}</h1>
                <p class="fs-5"><b class="fs-4">Descripcion:</b> {{$manga -> descripcion}}</p>
                <p class="fs-5"><b class="fs-4">Tomos:</b> {{$manga -> tomos}}</p>
                <p class="fs-5"><b class="fs-4">Estreno del siguiente tomo:</b> {{$manga -> proximo_tomo}}</p>
                <ul class="d-flex list-unstyled gap-3 mb-3">
                    @forelse($manga->generos as $genero)
                    <li class=" bg-light text-dark px-3 rounded fw-bold">
                        {{$genero -> nombre}}
                    </li>
                    @empty
                    <li class=" bg-danger text-dark px-3 rounded fw-bold">
                        Sin genero
                    </li>
                    @endforelse
                </ul>
                <p class="fs-5"><b class="fs-4">Precio:</b> ${{$manga -> precio}}</p>
                <p class="fs-5"><b class="fs-4">Mangaka:</b> {{$manga -> mangaka}}</p>

            </div>
        </div>
        <form class="mt-5" action="{{route ('admin.mangas.eliminar.manga', ['id' => $manga -> manga_id])}}" method="post">
            @csrf
            <button type="submit" class="btn btn-outline-danger w-100 radius">Eliminar</button>
        </form>
    </div>
</section>




@endsection
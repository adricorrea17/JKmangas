<?php

/** @var \App\Models\Manga $manga */
?>
@extends('layouts.main')
@section('main')
@section('title'){{$manga -> titulo}} @endsection
<section class="container margen-vista bg-dark px-2 py-3 text-light d-flex flex-column my-4">
    <div class="mx-auto d-flex gap-5 p-3 flex-column flex-lg-row">
        <div class="d-flex justify-content-center">
            @if($manga->portada != null && file_exists(public_path('img/' . $manga->portada)))
            <img class="rounded text-center imgeditar col-10 col-sm-8 col-md-6 col-lg-12" src="{{ url('img/' . $manga->portada) }}" alt="Portada del manga {{$manga->titulo}}">
            @elseif($manga->portada == null)
            <img class="rounded text-center imgeditar col-10 col-sm-8 col-md-6 col-lg-12" src="../../public/img/default.png" alt="Portada del manga {{$manga->titulo}}">
            @endif
        </div>
        <div class="d-flex flex-column justify-content-center w-75">
            <h1 class="mb-3 fw-bold">{{$manga->titulo}}</h1>
            <p class="fs-5"><b class="fs-4">Descripcion:</b> {{$manga->descripcion}}</p>
            <p class="fs-5"><b class="fs-4">Tomos:</b> {{$manga->tomos}}</p>
            <p class="fs-5"><b class="fs-4">Estreno del siguiente tomo:</b> {{$manga->proximo_tomo}}</p>
            <ul class="d-flex list-unstyled gap-3 mb-3">
                @forelse($manga->generos as $genero)
                <li class="bg-light text-dark px-3 rounded fw-bold">
                    {{$genero->nombre}}
                </li>
                @empty
                <li class="bg-danger text-dark px-3 rounded fw-bold">
                    Sin genero
                </li>
                @endforelse
            </ul>
            <p class="fs-5"><b class="fs-4">Precio del manga físico:</b> ${{$manga->precio}}</p>
            <p class="fs-5"><b class="fs-4">Mangaka:</b> {{$manga->mangaka}}</p>
            <button class="btn btn-secondary font">Leer</button>
        </div>
    </div>
</section>
<section class="container margen-vista bg-dark px-2 py-3 text-light d-flex flex-column my-4">
    @if(Auth::check())
    <form class="mb-3" action="{{ route('guardar.comentario') }}" method="post">
        @csrf
        <input type="hidden" name="manga_id" value="{{$manga->manga_id}}">
        <div class="form-group mb-2">
            <label for="comentario">Agregar un comentario:</label>
            <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar comentario</button>
    </form>
    @else
    <p>Inicia sesión para dejar un comentario.</p>
    @endif
    @if(count($manga->comentarios) > 0)
        @foreach ($manga->comentarios as $comentario)
            <div class="d-flex mb-3">
                <img class="img-comentario" src="{{ url('img/' . $comentario->usuario->imagen) }}" alt="">
                <p class="px-2 my-auto"><strong>{{ $comentario->usuario->nombre_usuario }}</strong></p>
                @if($comentario->usuario->usuarios_plan_id == 3)
                    <img height="20px" src="{{ url('img/plan-3.png') }}" alt="">
                @endif
                <!-- @if($comentario->usuario->usuarios_rol_id == 1)
                    <p>aca poner el gogo del admin????</p>
                @endif -->
            </div>
            <p>{{ $comentario->comentario }}</p>
        @endforeach
    @else
        <p>Sé el primer usuario en comentar.</p>
    @endif

</section>


@endsection
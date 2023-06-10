<?php

/** @var \App\Models\Usuario $usuario */


?>
@extends('layouts.main')
@section('main')
@section('title') {{$usuario->nombre_usuario}}@endsection

<section class=" container w-50 p-4 margen-usuario bg-dark px-5 py-3 text-light d-flex flex-column my-4 radius">
    <div class="w-100 mx-auto d-flex gap-5 p-3 ">
        <picture>
            @if ($usuario->imagen == null)
            <img class="rounded-3 perfilimg" src="../../../../public/img/perfil.png" alt="Imagen de perfil de {{$usuario -> nombre_usuario}}">
            @else
            <img class="rounded-3 perfilimg" src="../../../../public/img/{{$usuario -> imagen}}" alt="Imagen de perfil de {{$usuario -> nombre_usuario}}">
            @endif
        </picture>
        <div class="d-flex flex-column ">

            <h1 class="mb-3 fw-bold">{{$usuario->nombre_usuario}}</h1>
            <p class="fs-5"><b class="fs-4">Rol:</b> {{ $usuario->rol()->first()->rol }}</p>
            <p class="fs-5"><b class="fs-4">Email:</b> {{$usuario->email}}</p>

            @if ($usuario->usuarios_plan_id == null)
            <p><label class=" bg-danger text-dark px-3 rounded fw-bold">Sin paquete</label></p>
            @else
            <p><label class=" bg-light text-dark px-3 rounded fw-bold">{{ $usuario->UsuariosPlans()->first()->nombre }}</label></p>
            @endif



        </div>
    </div>
</section>


@endsection
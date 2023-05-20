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
            <img class="rounded-circle" src="../../../img/perfil.jpg" alt="Imagen de perfil de {{$usuario -> nombre_usuario}}">
            @else
            <img class="rounded-circle" src="../../../img/perfil/{{$usuario -> imagen}}" alt="Imagen de perfil de {{$usuario -> nombre_usuario}}">
            @endif
        </picture>
        <div class="d-flex flex-column ">

            <h1 class="mb-3 fw-bold">{{$usuario->nombre_usuario}}</h1>
            <p class="fs-5"><b class="fs-4">Rol:</b> {{$usuario->rol->rol}}</p>
            <p class="fs-5"><b class="fs-4">Email:</b> {{$usuario->email}}</p>
            
            @if ($usuario->UsuariosPlans != null)
            <p><b class="fs-4">Plan:</b> <label class="bg-light text-dark px-3 rounded fw-bold">{{$usuario->UsuariosPlans->nombre}}</label></p>
            <picture>
                <img src="../../../img/perfil/{{$usuario->UsuariosPlans->imagen}}" alt="Imagen que se obtiene en el servicio de {{$usuario->UsuariosPlans->nombre}}">
            </picture>
            @else
            <p><b class="fs-4">Plan:</b> <label class=" bg-danger text-dark px-3 rounded fw-bold">Sin paquete</label></p>
            @endif



        </div>
    </div>
</section>


@endsection
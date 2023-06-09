<?php

/** @param \Illuminate\Support\ViewErrorBag $errors */
?>
@extends('layouts.main')

@section('title') {{$usuario->nombre_usuario}}@endsection

@section('main')
<section id="perfil">
    <div class="bannerPerfil"></div>
    <div class="container">
        <div class="row">
            <div class="card col-lg-3" id="infoPerfil">
                <div class="w-100 mx-auto d-flex gap-5 p-3 ">
                    <picture>
                        @if ($usuario->imagen == null)
                        <img class="rounded-3 perfilimg" src="img/perfil.png" alt="Imagen de perfil de {{$usuario -> nombre_usuario}}">
                        @else
                        <img class="rounded-3 perfilimg" src="img/{{$usuario -> imagen}}"  alt="Imagen de perfil de {{$usuario -> nombre_usuario}}">
                        @endif
                    </picture>
                    <div class="d-flex flex-column ">
                        <h1 class="mb-1">{{$usuario->nombre_usuario}}</h1>
                        <dl>
                            <dt>Email</dt>
                            <dd>{{$usuario->email}}</dd>
                            <dt>Tu Plan</dt>
                            <dd>
                                @if ($usuario->usuarios_plan_id == null)
                                <p><label class=" bg-danger text-dark px-3 rounded fw-bold">Sin paquete</label></p>
                                @elseif($usuario->usuarios_plan_id == 1)
                                <p><label class=" bg-dark text-light px-3 rounded fw-bold">Otaku Junior</label></p>
                                @elseif($usuario->usuarios_plan_id == 2)
                                <p><label class=" bg-dark text-light px-3 rounded fw-bold">Otaku Shonen</label></p>
                                @elseif($usuario->usuarios_plan_id == 3)
                                <p><label class=" bg-dark text-light px-3 rounded fw-bold">Otaku-Sama</label></p>
                                @endif
                            </dd>
                            <dt>
                                Tu Rol
                            </dt>
                            <dd>
                                @if ($usuario->usuarios_rol_id == 1)
                                <p><label class=" bg-dark text-light px-3 rounded fw-bold">Administrador</label></p>
                                @elseif($usuario->usuarios_rol_id == 2)
                                <p><label class=" bg-dark text-light px-3 rounded fw-bold">Usuario Comun</label></p>
                                @endif
                            </dd>
                            <a class="btn btn-dark" href="{{ route('auth.perfil.form')}}">¿Quieres modificar tus datos?</a>
                        </dl>

                    </div>

                </div>
            </div>

</section>
<section class="mb-6 mt-1 container mx-auto">
    <h2 class="pt-5 text-light text-center font">
        @if( $usuario->usuarios_plan_id )
        ¿Deseas actualizar tu plan?
        @else
        Elige un plan
        @endif
    </h2>

    @include('components.planes')
</section>

@endsection
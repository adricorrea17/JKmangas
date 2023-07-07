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
                <div class="w-100 mx-auto d-flex gap-sm-5 p-3 ">
                    <picture>
                        @if ($usuario->imagen == null)
                        <img class="rounded-3 perfilimg" src="img/perfil/perfil.png" alt="Imagen de perfil de {{$usuario -> nombre_usuario}}">
                        @else
                        <img class="rounded-3 perfilimg" src="img/perfil/{{$usuario -> imagen}}"  alt="Imagen de perfil de {{$usuario -> nombre_usuario}}">
                        @endif
                    </picture>
                    <div class="d-flex flex-column mx-auto mx-sm-0">
                        <h1 class="mb-1 h1Perfil">{{$usuario->nombre_usuario}}</h1>
                        <dl>
                            <dt>Email</dt>
                            <dd>{{$usuario->email}}</dd>
                            <dt>Tu Plan</dt>
                            <dd>
                                @if ($usuario->usuarios_plan_id == null)
                                <p><label class=" bg-danger text-dark px-3 rounded fw-bold">Sin paquete</label></p>
                                @else
                                <p><label class=" bg-dark text-light px-3 rounded fw-bold">{{ $usuario->UsuariosPlans()->first()->nombre }}</label></p>
                                @endif
                            </dd>

                            <!--<a class="btn btn-secondary" href="{{ route('auth.perfil.form')}}">¿Quieres modificar tus datos?</a>-->
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">
                                ¿Quieres modificar tus datos?
                            </button>
                            @include('components/perfilForm')
                        </dl>

                    </div>

                </div>
            </div>

</section>
@if($usuario->ban != 1)
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
@endif
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector('#changePassCheck').addEventListener('change', function() {
            document.getElementById('hidePasswd')
                .classList.toggle('d-block');

            document.getElementById('hidePasswd')
                .classList.toggle('d-none');
        })
    });
</script>

@endsection
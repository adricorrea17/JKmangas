<?php

/** @param \Illuminate\Support\ViewErrorBag $errors */
?>
@extends('layouts.main')

@section('title', 'Iniciar Sesión')

@section('main')
<section id="perfil">
    <div class="bannerPerfil"></div>
    <div class="container">
        <div class="row">
            <div class="card col-lg-3" id="infoPerfil">
                <div class="w-100 mx-auto d-flex gap-5 p-3 ">
                    <picture>
                        @if ($usuario->imagen == null)
                        <img class="rounded-3" src="img/perfil.png" alt="Imagen de perfil de {{$usuario -> nombre_usuario}}">
                        @else
                        <img class="rounded-3" src="img/perfil/{{$usuario -> imagen}}" alt="Imagen de perfil de {{$usuario -> nombre_usuario}}">
                        @endif
                    </picture>
                    <div class="d-flex flex-column ">
                        <h1 class="mb-1">Mi Perfil</h1>
                        <dl>
                            <dt>Email</dt>
                            <dd>{{$usuario->email}}</dd>
                            <dt>Usuario</dt>
                            <dd>{{$usuario->nombre_usuario}}</dd>
                            <dt>Tu Plan</dt>
                            <dd>{{$usuario->usuarios_plan_id}}</dd>
                        </dl>
                    </div>
                </div>
            </div>
</section>
<section class="margen col-12 rounded bg-dark p-5 text-light container mx-auto">
    <h1></h1>
    <h1 class="mb-3 font">Modifica tus datos</h1>

    <form action="{{ route('auth.perfil.accion') }}" method="post" class="d-flex flex-column justify-content-center">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label fs-5 font">Email</label>
            <input type="email" name="email" id="email" value="{{ $usuario->email }}" class="form-control @error('email') border border-danger @enderror">
        </div>
        @error('email')
        <div class="mb-3 text-dark font"><span class="visually-hidden">Error:</span> {{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="nombre_usuario" class="form-label fs-5 font">Nombre de usuario</label>
            <input type="text" value="{{ $usuario->nombre_usuario }}" name="nombre_usuario" id="nombre_usuario" class="form-control @error('password') border border-danger @enderror" value="{{ old('nombre_usuario', '') }}" @error('nombre_usuario') aria-describedby="nombre_usuario-error" @enderror>
        </div>
        @error('nombre_usuario')
        <div class="mb-3 text-dark font"><span class="visually-hidden">Error:</span> {{ $message }}</div>
        @enderror

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="changePassCheck">
            <label class="form-check-label" for="changePassCheck">
                ¿Deseas cambiar tu constraseña?
            </label>
        </div>
        <div class="d-none" id="hidePasswd">

            <div class="mb-3">
                <label for="password" class="form-label fs-5 font">Tu contraseña actual</label>
                <input type="password" placeholder="Escribe tu contraseña" name="oldpassword" id="password" class="form-control @error('password') border border-danger @enderror">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fs-5 font">Tu nueva contraseña</label>
                <input type="password" placeholder="Escribe tu nueva contraseña" name="newpassword" id="password" class="form-control @error('password') border border-danger @enderror">
            </div>
        </div>
        @error('password')
        <div class="mb-3 text-dark font"><span class="visually-hidden">Error:</span> {{ $message }}</div>
        @enderror

        <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="w-50 btn btn-primary radius text-dark ">Guardar cambios</button>
        </div>
    </form>
</section>

<section class="bg-dark mb-6 mt-1 container mx-auto">
    <h2 class="pt-5 text-light text-center font">
        @if( $usuario->usuarios_plan_id )
        Actualiza tu plan
        @else
        Elige un plan
        @endif
    </h2>

    @include('components.planes')
</section>

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
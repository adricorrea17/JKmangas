<?php

/** @param \Illuminate\Support\ViewErrorBag $errors */
?>
@extends('layouts.main')

@section('title', 'Iniciar Sesión')

@section('main')

<section class="margen rounded bg-dark p-5 text-light mx-auto col-10 col-md-6 col-lg-5">

    <h1 class="mb-3 font">Iniciar Sesión</h1>

    <form action="{{ route('auth.login.accion') }}" method="post" class="d-flex flex-column justify-content-center">
        @csrf
        <div class="mb-3">
            <label for="nombre_usuario" class="form-label fs-5 font">Nombre de usuario</label>
            <input type="text" placeholder="Escribe tu nombre de usuario" name="nombre_usuario" id="nombre_usuario" class="form-control @error('password') border border-danger @enderror" value="{{ old('nombre_usuario', '') }}" @error('nombre_usuario') aria-describedby="nombre_usuario-error" @enderror>
        </div>
        @error('nombre_usuario')
        <div class="mb-3 text-danger font"><span class="visually-hidden">Error:</span> {{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="password" class="form-label fs-5 font">Password</label>
            <input type="password" placeholder="Escribe tu contraseña" name="password" id="password" class="form-control @error('password') border border-danger @enderror">
        </div>
        @error('password')
        <div class="mb-3 text-danger font"><span class="visually-hidden">Error:</span> {{ $message }}</div>
        @enderror
        <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="w-50 btn btn-primary radius text-dark">Ingresar</button>
        </div>
    </form>
</section>
@endsection
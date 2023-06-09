<?php

/** @param \Illuminate\Support\ViewErrorBag $errors */
?>
@extends('layouts.main')

@section('title', 'Registro de usuario')

@section('main')
<section class="margen col-12 rounded bg-dark p-5 text-light w-50 mx-auto">

    <h1 class="mb-3 font">Registrar</h1>

    <form action="{{ route('auth.register.accion') }}" method="post" class="d-flex flex-column justify-content-center">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label fs-5 font">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') border border-danger @enderror">
        </div>
        @error('email')
        <div class="mb-3 text-dark font"><span class="visually-hidden">Error:</span> {{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="nombre_usuario" class="form-label fs-5 font">Nombre de usuario</label>
            <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control @error('password') border border-danger @enderror" value="{{ old('nombre_usuario', '') }}" @error('nombre_usuario') aria-describedby="nombre_usuario-error" @enderror>
        </div>
        @error('nombre_usuario')
        <div class="mb-3 text-dark font"><span class="visually-hidden">Error:</span> {{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="password" class="form-label fs-5 font">Password</label>
            <input type="password" name="password" id="password" class="form-control @error('password') border border-danger @enderror">
        </div>
        @error('password')
        <div class="mb-3 text-dark font"><span class="visually-hidden">Error:</span> {{ $message }}</div>
        @enderror

        <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="w-50 btn btn-primary radius ">Ingresar</button>
        </div>
    </form>
</section>
@endsection
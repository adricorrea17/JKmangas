<?php

/** @var \App\Models\Usuario $usuario */


?>
@extends('layouts.main')
@section('main')
@section('title') {{$usuario->nombre_usuario}}@endsection
<section id="perfil">
    <div class="bannerPerfil"></div>
    <div class="container">
        <div class="row">
            <div class="card col-lg-3" id="infoPerfil">
                <div class="w-100 mx-auto d-flex gap-sm-5 p-3 ">
                    <picture>
                        @if ($usuario->imagen == null)
                        <img class="rounded-3 perfilimg" src="../../../../public/img/perfil/perfil.png" alt="Imagen de perfil de {{$usuario -> nombre_usuario}}">
                        @else
                        <img class="rounded-3 perfilimg" src="../../../../public/img/perfil/{{$usuario -> imagen}}" alt="Imagen de perfil de {{$usuario -> nombre_usuario}}">
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


                            @if($usuario->usuarios_rol_id != 1 && $usuario->id != Auth::user()->id)
                            <form action="{{ route('admin.ban', ['id' => $usuario->id]) }}" method="post">
                                @csrf
                                @if(!$usuario->ban)
                                <button type="submit" class="btn btn-outline-danger w-100">Banear</button>
                                @else
                                <button type="submit" class="btn btn-outline-success w-100">Sacar-Ban</button>
                                @endif
                            </form>
                            @endif
                        </dl>

                    </div>

                </div>
            </div>

</section>



@endsection
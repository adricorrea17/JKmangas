<?php

/** @var \App\Models\Usuario $usuarios */

?>
@extends('layouts.main')
@section('main')
@section('title') Usuarios @endsection

<section class="container mt-4">
  <h1 class="text-light">Usuarios</h1>
  <form id="formulario" class="mb-4 text-center" data-aos="fade-down" method="get">
    <input class="bg-dark border radius px-4 py-1 w-50 text-light buscar" type="text" name="search" id="buscar-usuario" placeholder="Busca al usuario">
    <button class="btn btn-primary border radius px-3" type="submit">Buscar</button>
  </form>
  <table class="w-100 mt-4 table">
    <thead class="bg-dark text-light">
      <tr>
        <th></th>

        @foreach([
        'usuarios_plan_id'=>'Plan',
        'nombre_usuario'=>'Usuario',
        'email'=>'Mail',
        'created_at'=>'Se unio el:',
        'fecha_cierre'=>'Su plan vence el:'
        ] as $key => $item)
        <th>
          <a class="text-white" href="?o={{ $key }}{{ $orden == ($key && $direccion != 'desc') ? '&d=desc' : '' }}">
            {{ $item }} <i class="fa fa-arrow-{{ ($orden == $key && $direccion != 'desc') ? 'up' : 'down' }}" style="{{ $orden != $key ? 'opacity:.5' : '' }}"></i>
          </a>
        </th>
        @endforeach
        <th>Acciones</th>
      </tr>
    </thead>
    </tbody>
    @foreach($usuarios as $usuario)
    <tr class="usuario">

      <td class="mb-3 text-light"><img class="img-comentario" src="{{ url('img/perfil/' . ($usuario->imagen == null ? 'perfil.png' : $usuario->imagen)) }}" alt="Imagen de perfil de {{ $usuario->imagen }}"></td>
      <td class="mb-3 text-light">
        @if($usuario->imgPlan != null)
        <img class="img-comentario" src="{{ url('img/' . $usuario->imgPlan) }}" alt="Imagen de perfil de {{ $usuario->imgPlan }}">
        @endif
      </td>
      <td class="mb-3 text-light"><b>{{ $usuario->nombre_usuario }}</b></td>
      <td class="mb-3 text-light">{{ $usuario->email }}</td>
      <td class="mb-3 text-light">{{ $usuario->created_at }}</td>
      <td class="mb-3 text-light">{{ $usuario->fecha_cierre }}</td>
      <td>
        <div class="d-flex gap-1">
          <a href="{{route('admin.mangas.verusuario',['id'=> $usuario->id] )}}" class="btn btn-primary">Ver</a>
        </div>

      </td>

    </tr>
    @endforeach
    </tbody>

  </table>
</section>

@endsection
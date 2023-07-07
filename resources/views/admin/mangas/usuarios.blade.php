<?php

/** @var \App\Models\Usuario $usuarios */

?>
@extends('layouts.main')
@section('main')
@section('title') Usuarios @endsection

<section class="container mt-4">
  <h1 class="text-light">Usuarios</h1>
  <form id="formulario" class="mb-4 text-center" data-aos="fade-down">
    <input class="bg-dark border radius px-4 py-1 w-50 text-light buscar" type="text" id="buscar-usuario" placeholder="Busca al usuario">
    <button class="btn btn-primary border radius px-3" type="submit">Buscar</button>
  </form>
  <table class="w-100 mt-4 table">
    <thead class="bg-dark text-light">
      <tr>
        <th></th>
        <th></th>
        <th>Usuario</th>
        <th>Mail</th>
        <th>Se unio el:</th>
        <th>Su plan vence el:</th>
        <th>Acciones</th>
      </tr>
    </thead>
    </tbody>
    @foreach($usuarios as $usuario)
    <tr class="usuario">
      
      <td class="mb-3 text-light nombre-usuario"><b><img class="img-comentario" src="{{ url('img/perfil/' . ($usuario->imagen == null ? 'perfil.png' : $usuario->imagen)) }}" alt="Imagen de perfil de {{ $usuario->imagen }}"></b></td>
      <td class="mb-3 text-light nombre-usuario"><b><img class="img-comentario" src="{{ url('img/' . ($usuario->imgPlan == null ? 'perfil.png' : $usuario->imgPlan)) }}" alt="Imagen de perfil de {{ $usuario->imgPlan }}"></b></td>
      <td class="mb-3 text-light nombre-usuario"><b>{{ $usuario->nombre_usuario }}</b></td>
      <td class="mb-3 text-light nombre-usuario"><b>{{ $usuario->email }}</b></td>
      <td class="mb-3 text-light nombre-usuario"><b>{{ $usuario->created_at }}</b></td>
      <td class="mb-3 text-light nombre-usuario"><b>{{ $usuario->fecha_cierre }}</b></td>
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
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('formulario').addEventListener('submit', function(event) {
      event.preventDefault();

      let buscarTitulo = document.getElementById('buscar-usuario').value.toLowerCase();


      let usuarios = document.getElementsByClassName('usuario');

      for (let i = 0; i < usuarios.length; i++) {
        let usuario = usuarios[i];
        let titulo = usuario.querySelector('.nombre-usuario').textContent.toLowerCase();



        if (titulo.includes(buscarTitulo)) {
          usuario.style.display = 'block';
        } else {
          usuario.style.display = 'none';
        }
      }
    });
  });
</script>
@endsection
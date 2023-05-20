<?php

/** @var \App\Models\Usuario $usuarios */

?>
@extends('layouts.main')
@section('main')
@section('title') Usuarios @endsection
<section class="container mt-4">
  <h1>Usuarios</h1>
  <table class="w-100 mt-4 table">
    <thead class="bg-dark text-light">
      <tr>
        <th>Nombre</th>
        <th>Acciones</th>
      </tr>
    </thead>
    </tbody>
    @foreach($usuarios as $usuario)
    <tr>
      <td class="mb-3"><b>{{$usuario -> nombre_usuario}}</b></td>
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
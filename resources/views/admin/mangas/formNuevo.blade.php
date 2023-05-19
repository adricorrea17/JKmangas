<?php

/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \Illuminate\Database\Eloquent\Collection\App\Models\Genero[] $generos */
?>
@extends('layouts.main')
@section('title', 'Publicar un nuevo manga')
@section('main')
<section class="container p-4">
    <div class="radius bg-dark p-5 text-light w-75 mx-auto">
        <h1 class="text-center font">Nuevo Manga</h1>
        @if ($errors -> any())
        <div class="text-dark fw-bold font">Hay algun error en los campos</div>
        @endif
        <form action="{{route('admin.mangas.nuevo.grabar')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="titulo" class="form-label w-100 fs-5 font">Titulo:</label>
                <input class="form-control" type="text" name="titulo" id="titulo" value="{{old('titulo')}}" @error('titulo') aria-describedby="titulo-error" @enderror>

                @error('titulo')
                <div class="text-dark fw-bold font" id="titulo-error">{{ $errors->first('titulo') }}</div>
                @enderror
            </div>
            <div>
                <label for="descripcion" class="form-label w-100 fs-5 font mt-3">Descripcion: </label>
                <textarea class="form-control" name="descripcion" id="descripcion" @error('descripcion') aria-describedby="descripcion-error" @enderror>{{old('descripcion')}}</textarea>
                @error('descripcion')
                <div class="text-dark fw-bold font" id="descripcion-error">{{ $errors->first('descripcion') }}</div>
                @enderror
            </div>
            <div>
                <label for="precio" class="form-label w-100 fs-5 font mt-3">Precio:</label>
                <input class="form-control" type="number" name="precio" id="precio" value="{{old('precio')}}" @error('precio') aria-describedby="precio-error" @enderror>

                @error('precio')
                <div class="text-dark fw-bold font" id="precio-error">{{ $errors->first('precio') }}</div>
                @enderror
            </div>
            <div>
                <label for="mangaka" class="form-label w-100 fs-5 font mt-3">Mangaka:</label>
                <input class="form-control" type="text" name="mangaka" id="mangaka" value="{{old('mangaka')}}" @error('mangaka') aria-describedby="mangaka-error" @enderror>

                @error('mangaka')
                <div class="text-dark fw-bold font" id="mangaka-error">{{ $errors->first('mangaka') }}</div>
                @enderror
            </div>
            <div>
                <label for="tomos" class="form-label w-100 fs-5 font mt-3">Tomos:</label>
                <input class="form-control" type="number" name="tomos" id="tomos" value="{{old('tomos')}}" @error('tomos') aria-describedby="tomos-error" @enderror>

                @error('tomos')
                <div class="text-dark fw-bold font" id="tomos-error">{{ $errors->first('tomos') }}</div>
                @enderror
            </div>
            <div>
                <label for="proximo_tomo" class="form-label w-100 fs-5 font mt-3">Proximo estreno:</label>
                <input class="form-control" type="date" name="proximo_tomo" id="proximo_tomo" value="{{old('proximo_tomo')}}" @error('proximo_tomo') aria-describedby="proximo_tomo-error" @enderror>

                @error('proximo_tomo')
                <div class="text-dark fw-bold font" id="proximo_tomo-error">{{ $errors->first('proximo_tomo') }}</div>
                @enderror
            </div>
            <fieldset class="mt-3">
                <legend class="fs-5 font">Generos</legend>
                @foreach($generos as $genero)
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" value="{{$genero->genero_id}}" id="genero-{{$genero->genero_id}}" name="generos[]" @checked(in_array( $genero->genero_id, old('generos', [])))>

                    <label for="genero-{{$genero->genero_id}}" class="font form-check-label bg-light text-dark px-3 rounded fw-bold">{{$genero->nombre}}</label>
                </div>
                @endforeach
            </fieldset>
            <div>
                <label for="portada" class="form-label w-100 fs-5 font">Portada:</label>
                <input class="form-control" type="file" name="portada" id="portada" />
            </div>

            <button class="btn btn-light btn-outline-success fw-light mt-3 font" type="submit">Publicar</button>
        </form>
    </div>
</section>
@endsection
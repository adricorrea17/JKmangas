<?php

/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Models\Manga $manga */
/** @var \Illuminate\Database\Eloquent\Collection\App\Models\Genero[] $generos */
?>
@extends('layouts.main')
@section('title') Edicion del manga {{$manga -> titulo}} @endsection
@section('main')
<section class="container p-4">
    <div class="radius bg-dark p-5 text-light w-75 mx-auto">
        <h1 class="text-center font">Editar Manga</h1>
        @if ($errors -> any())
        <div class="text-dark fw-bold font">Hay algun error en los campos</div>
        @endif
        <form action="{{route('admin.mangas.editar.manga', ['id' => $manga->manga_id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="titulo" class="form-label w-100 mt-3 font">Titulo:</label>
                <input class="form-control" type="text" name="titulo" id="titulo" value="{{old('titulo', $manga->titulo)}}" @error('titulo') aria-describedby="titulo-error" @enderror>

                @error('titulo')
                <div class="text-dark fw-bold font" id="titulo-error">{{ $errors->first('titulo') }}</div>
                @enderror
            </div>
            <div>
                <label for="descripcion" class="form-label w-100 mt-3 font">Descripcion: </label>
                <textarea class="form-control" name="descripcion" id="descripcion" @error('descripcion') aria-describedby="descripcion-error" @enderror>{{old('descripcion',$manga->descripcion)}}</textarea>
                @error('descripcion')
                <div class="text-dark fw-bold font" id="descripcion-error">{{ $errors->first('descripcion') }}</div>
                @enderror
            </div>
            <div>
                <label for="precio" class="form-label w-100 mt-3 font">Precio:</label>
                <input class="form-control" type="number" name="precio" id="precio" value="{{old('precio', $manga->precio)}}" @error('precio') aria-describedby="precio-error" @enderror>

                @error('precio')
                <div class="text-dark fw-bold font" id="precio-error">{{ $errors->first('precio') }}</div>
                @enderror
            </div>
            <div>
                <label for="mangaka" class="form-label w-100 mt-3 font">Mangaka:</label>
                <input class="form-control" type="text" name="mangaka" id="mangaka" value="{{old('mangaka', $manga->mangaka)}}" @error('mangaka') aria-describedby="mangaka-error" @enderror>

                @error('mangaka')
                <div class="text-dark fw-bold font" id="mangaka-error">{{ $errors->first('mangaka') }}</div>
                @enderror
            </div>
            <div>
                <label for="tomos" class="form-label w-100 mt-3 font">Tomos:</label>
                <input class="form-control" type="number" name="tomos" id="tomos" value="{{old('tomos', $manga->tomos)}}" @error('tomos') aria-describedby="tomos-error" @enderror>

                @error('tomos')
                <div class="text-dark fw-bold font" id="tomos-error">{{ $errors->first('tomos') }}</div>
                @enderror
            </div>
            <div>
                <label for="proximo_tomo" class="form-label w-100 mt-3 font">Estreno del proximo tomo:</label>
                <input class="form-control" type="date" name="proximo_tomo" id="proximo_tomo" value="{{old('proximo_tomo', $manga->proximo_tomo)}}" @error('proximo_tomo') aria-describedby="proximo_tomo-error" @enderror>

                @error('proximo_tomo')
                <div class="text-dark fw-bold font" id="proximo_tomo-error">{{ $errors->first('proximo_tomo') }}</div>
                @enderror
            </div>
            <fieldset class="mt-3">
                <legend class="fs-5 font">Generos</legend>
                @foreach($generos as $genero)
                <div class="form-check form-check-inline">
                    <input type="checkbox" class="form-check-input" value="{{$genero->genero_id}}" id="genero-{{$genero->genero_id}}" name="generos[]" @checked(in_array( $genero->genero_id, old('generos', $manga->generos->pluck('genero_id')->toArray())))>

                    <label for="genero-{{$genero->genero_id}}" class="font form-check-label bg-light text-dark px-3 rounded fw-bold">{{$genero->nombre}}</label>
                </div>
                @endforeach
            </fieldset>
            <div>
                <label for="portada" class="form-label w-100 mt-3 font ">Portada:</label>
                @if($manga -> portada != null && file_exists(public_path('img/' . $manga->portada)))
                <img class="rounded mt-3" src="{{ url('img/' . $manga->portada) }}" alt="Portada del manga {{$manga->titulo}}">
                @else
                <p class="fw-bold">No hay ninguan portada para este manga</p>
                @endif
                <input class="form-control mt-3" type="file" name="portada" id="portada" />
            </div>

            <button class="btn btn-light btn-outline-success fw-light mt-3 font" type="submit">Publicar</button>
        </form>
    </div>
</section>
@endsection
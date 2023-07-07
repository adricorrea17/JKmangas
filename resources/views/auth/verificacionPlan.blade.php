@extends('layouts.main')
@section('main')
@section('title') Estrenos @endsection

<section class="container margen-compra col-11 col-lg-9 col-xl-7 text-light my-4 radius">
    <div class="radius bg-dark p-5 text-light mx-auto">
        @if(Auth::user()->usuarios_plan_id != $plan -> id)
        <h1 class="text-white">Estas seguro que desea reducir su plan {{ $usuario->UsuariosPlans()->first()->nombre }} al plan {{$plan->nombre}}?</h1>
        @else
        <h1 class="text-white">Estas seguro que deseas cancelar el plan {{ $usuario->UsuariosPlans()->first()->nombre }}?</p>
            @endif
            <div class="w-100 mx-auto d-flex gap-5 p-4 mb-3 mangaid flex-column flex-lg-row">
                <img class="img-verif" src="img/{{ $plan->imagen }}" alt="Imagen de el plan {{ $plan->nombre }}">
                <div class="d-flex flex-column justify-content-center">
                    <p class="fs-5"><b class="fs-4">Nombre:</b> {{ $plan->nombre }}</p>
                    <p class="fs-5"><b class="fs-4">Descripcion:</b> {{ $plan->descripcion }}</p>
                    <p class="fs-5"><b class="fs-4">Precio:</b> $ {{ $plan->precio }}</p>
                </div>
            </div>
            <form action="{{ route('verificacion', ['id' => $plan->id]) }}" method="post">
                @csrf
                <input type="hidden" name="plan" value="{{$plan->id}}">
                <button class="col-12 radius mx-auto btn btn-danger fs-5 font">Confirmar</button>
            </form>
    </div>
</section>
@endsection
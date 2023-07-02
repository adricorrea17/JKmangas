@extends('layouts.main')
@section('main')
@section('title') Estrenos @endsection

<section class="container col-11 col-lg-9 col-xl-7 text-light my-4 radius">
    <div class="w-100 mx-auto d-flex gap-5 p-4 bg-dark px-5 py-3 d-flex flex-column margen-usuario">
    @if(Auth::user()->usuarios_plan_id != $plan -> id)
        <p class="text-white fs-2">Estas seguro que desea reducir su plan {{ $usuario->UsuariosPlans()->first()->nombre }} al plan {{$plan->nombre}}</p>
        @else
        <p class="text-white fs-2">Estas seguro que deseas cancelar el plan {{ $usuario->UsuariosPlans()->first()->nombre }}</p>
        @endif
        <form action="{{ route('verificacion', ['id' => $plan->id]) }}" method="post">
            @csrf
            <input type="hidden" name="plan" value="{{$plan->id}}">
            <button class="col-12 radius mx-auto btn btn-danger fs-5 font">Confirmar</button>
        </form>
    </div>
</section>
@endsection
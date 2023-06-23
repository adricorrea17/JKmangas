<?php

/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\UsuariosPlans[] $UsuariosPlans */
?>
<div class="plans-boxes d-flex flex-column flex-md-row justify-content-md-around p-5 gap-3">
    @foreach($UsuariosPlans as $i => $plan)
    <div class="card box d-flex flex-column text-center border radius p-3 gradiant text-light col-12 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="{{ $i==1 ? '0' : '200' }}">
        <picture>
            <img src="img/{{$plan->imagen}}" alt="Cabello correspondiente al plan de {{$plan->nombre}}">
        </picture>
        <h2 class="mt-3 font">{{$plan->nombre}}</h2>
        <!-- <p class="mt-2 fs-5 font">{{$plan->duracion}} meses</p> -->
        <p class="fs-3 fw-bold font">${{$plan->precio}}</p>
        <p class="mt-2 col-10 mx-auto fs-6 font mb-4">{{$plan->descripcion}}</p>


        <form action="{{ route('cambiar-plan', ['id' => $plan->id]) }}" method="post">
            @csrf
            @if(Auth::check())
            <input type="hidden" name="plan" value="{{ $usuario->usuarios_plan_id == $plan->id ? 0 : $plan->id}}">
            @endif
            @if(!Auth::check() || Auth::check() && $usuario->usuarios_plan_id == null)
            <button class="col-12 radius mx-auto btn btn-primary fs-5 font">Comprar {{$plan->nombre}}</button>
            @elseif(Auth::check() && $usuario->usuarios_plan_id == $plan->id)
            <button class="col-12 radius mx-auto btn btn-primary fs-5 font">Cancelar mi plan {{$plan->nombre}}</button>
            @elseif(Auth::check() && $plan->id > $usuario->usuarios_plan_id)
            <button class="col-12 radius mx-auto btn btn-success fs-5 font">Mejorar mi plan {{$plan->nombre}}</button>
            @elseif(Auth::check() && $plan->id < $usuario->usuarios_plan_id)
                <button class="col-12 radius mx-auto btn btn-danger fs-5 font">Reducir mi plan {{$plan->nombre}}</button>
                @endif
                
        </form>
    </div>
    @endforeach
</div>
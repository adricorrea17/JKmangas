<?php

/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\UsuariosPlans[] $UsuariosPlans */
?>
<div class="plans-boxes d-flex justify-content-around  p-5">
    @foreach($UsuariosPlans as $i => $plan)
    <div class="box d-flex flex-column text-center border radius p-3 w-25 bg-light" data-aos="zoom-in" data-aos-delay="{{ $i==1 ? '0' : '200' }}">
        <picture>
            <img src="img/{{$plan->imagen}}" alt="Cabello correspondiente al plan de {{$plan->nombre}}">
        </picture>
        <h2 class="mt-3 font">{{$plan->nombre}}</h2>
        <p class="mt-2 fs-5 font">{{$plan->duracion}} meses</p>
        <p class="fs-3 fw-bold font">${{$plan->precio}}</p>
        <p class="mt-2 col-10 mx-auto fs-5 font">{{$plan->descripcion_plan}}</p>

        @if(!Auth::check())
        <button class="col-12 radius mx-auto btn btn-primary fs-5 font">Comprar {{$plan->nombre}}</button>
        @elseif(Auth::check() && $usuario->usuarios_plan_id == $plan->id)
        <button class="col-12 radius mx-auto btn btn-secondary fs-5 font disable" disable>Este es tu plan</button>
        @elseif(Auth::check() && $plan->id > $usuario->usuarios_plan_id)
        <button class="col-12 radius mx-auto btn btn-success fs-5 font">Mejora tu plan a {{$plan->nombre}}</button>
        @elseif(Auth::check() && $plan->id < $usuario->usuarios_plan_id)
        <button class="col-12 radius mx-auto btn btn-danger fs-5 font">Reduce tu plan :( {{$plan->nombre}}</button>
        @endif
    </div>
    @endforeach
</div>
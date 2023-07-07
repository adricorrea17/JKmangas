@extends('layouts.main')
@section('main')
@section('title') Gracias por su compra @endsection

@if($anteriorPlan != null)
<div class="evolucion-container evolucion-img-wrapper">

    <div class="card box d-flex flex-column text-center border radius p-3 gradiant text-light col-11 mx-auto col-md-5" data-aos="zoom-in">
        <picture>
            <img src="{{ url('img/' . $anteriorPlan->imagen) }}" alt="Cabello correspondiente al plan de {{$plan->nombre}}" class="evolucion-img evolucion-img-1">
            <img src="{{ url('img/' . $plan->imagen) }}" alt="Imagen 2" alt="Cabello correspondiente al plan de {{$plan->nombre}}" class="evolucion-img evolucion-img-2">
        </picture>
        
        <h2 class="mt-3 font evolucion-img-2">{{ $plan->nombre }}</h2>
        <p class="fs-3 fw-bold font evolucion-img-2">${{ $plan->precio }}</p>
        <p class="mt-2 col-10 mx-auto fs-6 font mb-4 evolucion-img-2">{{ $plan->descripcion }}</p>
        <button class="col-12 radius mx-auto btn btn-primary fs-5 font evolucion-img-2">Volver al Inicio</button>
        
        <h2 class="mt-3 font evolucion-img-2">{{ $anteriorPlan->nombre }}</h2>
        <p class="fs-3 fw-bold font evolucion-img-2">${{ $anteriorPlan->precio }}</p>
        <p class="mt-2 col-10 mx-auto fs-6 font mb-4 evolucion-img-2">{{$anteriorPlan->descripcion}}</p>
        <button class="col-12 radius mx-auto btn btn-primary fs-5 font evolucion-img-2">Volver al Inicio</button>
    </div>
    <audio id="musica" src="{{ url('music/evolucion.mp3') }}" autoplay controls></audio>
</div>
@else
<p>Felicidades conseguiste el plan {{ $plan->nombre }}</p>
@endif





<script>
    setTimeout(function() {
        let evolucionImg1 = document.querySelector('.evolucion-img-1');
        let evolucionImg2 = document.querySelector('.evolucion-img-2');

        evolucionImg1.style.opacity = 0;
        evolucionImg2.style.opacity = 1;
        evolucionImg1.style.animation = 'none';
    }, 2500);
</script>
@endsection
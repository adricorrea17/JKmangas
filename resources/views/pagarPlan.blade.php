@extends('layouts.main')
@section('main')
@section('title') Estrenos @endsection
<section class="container margen-compra col-11 col-lg-9 col-xl-7 text-light my-4 radius">
    <div class="radius bg-dark p-5 text-light mx-auto">
        <h1 class="mb-3 font">Estas listo para la aventura?</h1>
        <p>Estas a un paso de obtener el plan {{ $plan->nombre }} </p>
        <div class="w-100 mx-auto d-flex gap-5 p-4 mb-3 mangaid flex-column flex-lg-row">

            <img class="img-verif" src="img/{{ $plan->imagen }}" alt="Imagen de el plan {{ $plan->nombre }}">
            <div class="d-flex flex-column justify-content-center">

                <p class="fs-5"><b class="fs-4">Nombre:</b> {{ $plan->nombre }}</p>
                <p class="fs-5"><b class="fs-4">Descripcion:</b> {{ $plan->descripcion }}</p>
                <p class="fs-5"><b class="fs-4">Precio:</b> $ {{ $plan->precio }}</p>
            </div>
        </div>
        <div id="wallet_container"></div>
    </div>
</section>


<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    const mp = new MercadoPago("{{ $mp_public }}");
    const bricksBuilder = mp.bricks();

    mp.bricks().create("wallet", "wallet_container", {
        initialization: {
            preferenceId: "{{ $preference->id }}",
        },
    });
</script>
@endsection
@extends('layouts.main')
@section('main')
@section('title') Estrenos @endsection
<section class="my-5 col-12 rounded bg-dark p-5 text-light container mx-auto">

    <h1 class="mb-3 font">Estas listo para la aventura?</h1>
    <p>Estas a un paso de obtener el plan {{ $plan->nombre }} </p>
    <div id="wallet_container"></div>

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
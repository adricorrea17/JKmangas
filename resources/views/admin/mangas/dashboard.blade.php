@extends('layouts.main')
@section('main')
@section('title') Dashboard @endsection

<section class="container col-11 col-lg-9 col-xl-7 text-light my-4 radius">
    <div class="mb-4">
        @include('components/admin/cardsCounter')
    </div>
    
    <div class="row">
        <div class="col-6">
            <h2>Ultimos usuarios</h2>
            <table class="w-100 mt-4 table">
                <thead class="bg-dark text-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                </tbody>
                @foreach($usuarios as $usuario)
                <tr class="usuario">
                    <td class="mb-3 text-light nombre-usuario"><b>{{$usuario -> nombre_usuario}}</b></td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{route('admin.mangas.verusuario',['id'=> $usuario->id] )}}" class="btn btn-primary">Ver</a>
                        </div>

                    </td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
        <div class="col-6">
        <h2>Últimas Suscripciones</h2>
            <table class="w-100 mt-4 table">
                <thead class="bg-dark text-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Plan</th>
                        <th>Fecha de susbripcion</th>
                    </tr>
                </thead>
                </tbody>
                @foreach($ultimasSuscripciones as $suscripcion)
                <tr class="usuario">
                    <td class="mb-3 text-light nombre-usuario"><b>{{ $suscripcion->nombre_usuario }}</b></td>
                    <td class="mb-3 text-light nombre-usuario"><b>{{ $suscripcion->plan }}</b></td>
                    <td class="mb-3 text-light nombre-usuario"><b>{{ $suscripcion->created_at }}</b></td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</section>


@endsection
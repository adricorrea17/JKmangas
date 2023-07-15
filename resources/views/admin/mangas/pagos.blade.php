@extends('layouts.main')
@section('main')
@section('title') Usuarios @endsection

<section class="container mt-4">
    <h1 class="text-light">Pagos</h1>
    <form id="formulario" class="mb-4 text-center" data-aos="fade-down" method="get">
        <input class="bg-dark border radius px-4 py-1 w-50 text-light buscar" type="text" name="search" id="buscar-usuario" placeholder="Busca al usuario">
        <button class="btn btn-primary border radius px-3" type="submit">Buscar</button>
    </form>
    <table class="w-100 mt-4 table">
        <thead class="bg-dark text-light">
            <tr>
                @foreach([
                'id'=>'ID',
                'created_at'=>'Fecha',
                'monto'=>'Monto',
                'nombre_usuario'=>'Usuario',
                'plan'=>'Plan'
                ] as $key => $item)
                <th>
                    <a class="text-white" href="?o={{ $key }}{{ $orden == ($key && $direccion != 'desc') ? '&d=desc' : '' }}">
                        {{ $item }} <i class="fa fa-arrow-{{ ($orden == $key && $direccion != 'desc') ? 'up' : 'down' }}" style="{{ $orden != $key ? 'opacity:.5' : '' }}"></i>
                    </a>
                </th>
                @endforeach
            </tr>
        </thead>
        </tbody>
        @foreach($pagos as $pago)
        <tr class="usuario">

            <td class="mb-3 text-light ">{{ $pago->id }}</td>
            <td class="mb-3 text-light ">{{ $pago->created_at }}</td>
            <td class="mb-3 text-light ">{{ $pago->monto }}</td>
            <td class="mb-3 text-light "><a class="text-white" href="{{route('admin.mangas.verusuario',['id'=> $pago->usuarioId] )}}">{{ $pago->nombre_usuario }}</a></td>
            <td class="mb-3 text-light ">{{ $pago->plan }}</td>

        </tr>
        @endforeach
        </tbody>

    </table>
</section>

@endsection
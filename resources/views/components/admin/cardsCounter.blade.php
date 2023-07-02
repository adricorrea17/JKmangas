<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card-counter ">
                <i class="fa fa-code-fork"></i>
                <span class="count-numbers">@money($ingresosEsteMes)</span>
                <span class="count-name">Ingresos de este mes</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-counter ">
                <i class="fa fa-money"></i>
                <span class="count-numbers">@money($ingresosTotales)</span>
                <span class="count-name">Ingresos totales</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-counter ">
                <i class="fa fa-address-book"></i>
                <span class="count-numbers">{{ $planesAdquiridos }}</span>
                <span class="count-name">Planes adquiridos</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-counter ">
                <i class="fa fa-users"></i>
                <span class="count-numbers">{{ $usuariosTotales }}</span>
                <span class="count-name">Usuarios</span>
            </div>
        </div>
    </div>
</div>
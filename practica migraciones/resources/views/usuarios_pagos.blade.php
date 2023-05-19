{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('monto', 'Monto:') !!}
			{!! Form::text('monto') !!}
		</li>
		<li>
			{!! Form::label('mp_validacion', 'Mp_validacion:') !!}
			{!! Form::text('mp_validacion') !!}
		</li>
		<li>
			{!! Form::label('plan_id', 'Plan_id:') !!}
			{!! Form::text('plan_id') !!}
		</li>
		<li>
			{!! Form::label('usuario_id', 'Usuario_id:') !!}
			{!! Form::text('usuario_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
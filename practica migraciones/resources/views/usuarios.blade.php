{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('nombre_usuario', 'Nombre_usuario:') !!}
			{!! Form::text('nombre_usuario') !!}
		</li>
		<li>
			{!! Form::label('password', 'Password:') !!}
			{!! Form::text('password') !!}
		</li>
		<li>
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email') !!}
		</li>
		<li>
			{!! Form::label('imagen', 'Imagen:') !!}
			{!! Form::text('imagen') !!}
		</li>
		<li>
			{!! Form::label('usuarios_plan_id', 'Usuarios_plan_id:') !!}
			{!! Form::text('usuarios_plan_id') !!}
		</li>
		<li>
			{!! Form::label('usuarios_rol_id', 'Usuarios_rol_id:') !!}
			{!! Form::text('usuarios_rol_id') !!}
		</li>
		<li>
			{!! Form::label('fecha_cierre', 'Fecha_cierre:') !!}
			{!! Form::text('fecha_cierre') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('nombre', 'Nombre:') !!}
			{!! Form::text('nombre') !!}
		</li>
		<li>
			{!! Form::label('imagen', 'Imagen:') !!}
			{!! Form::text('imagen') !!}
		</li>
		<li>
			{!! Form::label('precio', 'Precio:') !!}
			{!! Form::text('precio') !!}
		</li>
		<li>
			{!! Form::label('descripcion', 'Descripcion:') !!}
			{!! Form::textarea('descripcion') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}
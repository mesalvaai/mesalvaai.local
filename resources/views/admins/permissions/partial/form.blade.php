<div class="form-group">
	{{ Form::label('name', 'Permiso') }}
	{{ Form::text('name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ Form::label('slug', 'Slug') }}
	{{ Form::text('slug', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ Form::label('description', 'Descrição') }}
	{{ Form::text('description', null, ['class' => 'form-control']) }}
</div>
<hr>
{{-- <h3>Permiso especial</h3>
<div class="form-group">
	<label>{{ Form::radio('special', 'all-access') }} Acesso total</label>
	<label>{{ Form::radio('special', 'no-access') }} Nenhum acesso</label>
</div>
<hr>
<h3>Lista de Permisos</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach ($permissions as $permission)
			<li>
				<label>
					{!! Form::checkbox('permissions[]', $permission->id, null) !!}
					{{ $permission->name }}
					<em>({{ $permission->description ?: 'N/A' }})</em>
				</label>
			</li>
		@endforeach
	</ul>
</div> --}}

<div class="form-group">
	{{ Form::submit('Salvar', ['class' => 'btn btn-success float-right']) }}
</div>
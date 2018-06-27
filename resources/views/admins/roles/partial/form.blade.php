<div class="form-group">
	{{ Form::label('name', 'Rol') }}
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
<br>
<h3>Permiso especial</h3>
<div class="form-group">
	<div class="i-checks">
		{{ Form::radio('special', 'all-access',null,['class' => 'form-control-custom radio-custom', 'id' => 'radioCustom1']) }} 
		<label for="radioCustom1">Acesso total</label>
	
		{{ Form::radio('special', 'no-access', null, ['class' => 'form-control-custom radio-custom', 'id' => 'radioCustom2']) }} <label for="radioCustom2">Nenhum acesso</label>

		{{ Form::radio('special', '', null, ['class' => 'form-control-custom radio-custom', 'id' => 'radioCustom3']) }} <label for="radioCustom3">Ativar outros acessos</label>
	</div>
</div>

<br>
<h3>Lista de Permisos</h3>
<div class="form-group">
		@foreach ($permissions as $key => $permission)
			<div class="i-checks">
				{!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'form-control-custom', 'id' => 'checkboxCustom'.$key ]) !!}
				<label for="checkboxCustom{{ $key }}">
					{{ $permission->name }}
					<em>({{ $permission->description ?: 'N/A' }})</em>
				</label>
			</div>
		@endforeach
</div>

<div class="form-group">
	{{ Form::submit('Salvar', null, ['class' => 'btn btn-outline-success btn-sm']) }}
</div>
<div class="form-group">
	{{ Form::label('name', 'Nome do usuario') }}
	{{ Form::text('name', null, ['class' => 'form-control']) }}
</div>

<br>
<h3>Asignar roles</h3>
<div class="form-group">
	@foreach ($roles as $key => $role)
		<div class="i-checks">
			{!! Form::checkbox('roles[]', $role->id, null, ['class' => 'form-control-custom', 'id' => 'checkboxCustom'.$key ]) !!}
	      {{-- <input id="checkboxCustom2" type="checkbox" value="" checked="" class="form-control-custom"> --}}
	      <label for="checkboxCustom{{ $key }}">{{ $role->name }}<em>({{ $role->description ?: 'N/A' }})</em></label>
	    </div>
	    {{-- <div class="i-checks">
          <input id="checkboxCustom{{ $key }}" type="checkbox" value="" class="form-control-custom">
          <label for="checkboxCustom{{ $key }}">Option one</label>
        </div> --}}
	@endforeach
</div>

<div class="form-group">
	{{ Form::submit('Salvar', ['class' => 'btn btn-outline-success btn-sm']) }}
</div>
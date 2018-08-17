<div class="form-group">
	{!! Form::label('name', 'Nome') !!}

  @if ($errors->get('name'))

  @foreach ($errors->get('name') as $error)

  {!! Form::text('name', null, ['class' => 'form-control  is-invalid', 'required']) !!}

  <div class="invalid-feedback">
    {{ $error }}
  </div>
  
  @endforeach

  @else

  {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}

  @endif
</div>


<div class="form-group">
	{!! Form::label('description', 'Descrição') !!}

  @if ($errors->get('description'))

  @foreach ($errors->get('description') as $error)

  {!! Form::text('description', null, ['class' => 'form-control is-invalid', 'required']) !!}

  <div class="invalid-feedback">
    {{ $error }}
  </div>

  @endforeach

  @else

  {!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}

  @endif
</div>

<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-success btn-sm float-left']) !!}
</div>



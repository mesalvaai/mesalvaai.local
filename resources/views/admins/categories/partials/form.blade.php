<div class="form-group">
	{!! Form::label('name', 'Categoria') !!}

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
	{!! Form::label('description', 'Descrição da categoria') !!}

  @if ($errors->get('description'))

  @foreach ($errors->get('description') as $error)

  {!! Form::textarea('description', null, ['class' => 'form-control is-invalid', 'required']) !!}

  <div class="invalid-feedback">
    {{ $error }}
  </div>

  @endforeach

  @else

  {!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}

  @endif
</div>

<div class="form-group">
	{!! Form::label('status', 'Estado da categoria') !!}

  @if ($errors->get('title'))

  @foreach ($errors->get('title') as $error)

  {!! Form::select('status',[ '1' => 'Ativa', '0' => 'Inativa'], null, ['class' => 'form-control is-invalid', 'required']) !!}

  <div class="invalid-feedback">
    {{ $error }}
  </div>

  @endforeach

  @else

  {!! Form::select('status',[ '1' => 'Ativa', '0' => 'Inativa'], null, ['class' => 'form-control', 'required']) !!}

  @endif
</div>

<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-success btn-sm float-left']) !!}
</div>
<div class="form-group">
	{!! Form::label('title', 'Titulo da campanha') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('goal', 'Objetivo da campanha') !!}
	{!! Form::text('goal', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('start_date', 'Data inicial') !!}
	{!! Form::text('start_date', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('funds_received', 'Fundos recebidos') !!}
	{!! Form::text('funds_received', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('end_date', 'Data final') !!}
	{!! Form::text('end_date', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('description', 'Descrição da campanha') !!}
	{!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('location', 'Localização da campanha') !!}
	{!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('status', 'Satus da campanha') !!}
	{!! Form::select('status', [''=> '','0' => '0', '1' => '1'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('category_id', 'Categoria da campanha') !!}
	{!! Form::text('category_id', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('student_id', 'Estudante da campanha') !!}
	{!! Form::text('student_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-success btn-sm float-left']) !!}
</div>


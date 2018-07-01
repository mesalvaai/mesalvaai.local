<div class="form-group">
	{!! Form::label('title', 'Titulo da campanha') !!}
	{!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="row">
	<div class="form-group col">
		{!! Form::label('goal', 'Objetivo') !!}
		{!! Form::text('goal', null, ['class' => 'form-control', 'placeholder' =>'R$ 5000.00', 'required']) !!}
	</div>
	<div class="form-group col">
		{!! Form::label('funds_received', 'Fundos recebidos') !!}
		{!! Form::text('funds_received', null, ['class' => 'form-control', 'placeholder' =>'R$ 0.00']) !!}
	</div>
	<div class="form-group col">
		{!! Form::label('start_date', 'Data inicial') !!}
		{!! Form::date('start_date', \Carbon\Carbon::now(), ['class' => 'form-control', 'required']) !!}
	</div>
	<div class="form-group col">
		{!! Form::label('end_date', 'Data final') !!}
		{!! Form::date('end_date', \Carbon\Carbon::now(), ['class' => 'form-control', 'required']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('description', 'Descrição da campanha') !!}
	{!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('location', 'Localização da campanha') !!}
	{!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>

<div class="row">
	<div class="form-group col">
		{!! Form::label('category_id', 'Categoria da campanha') !!}
		{!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' =>'--Selecione uma categoria--', 'required']) !!}
	</div>
	<div class="form-group col">
		{!! Form::label('student_id', 'Estudante da campanha') !!}
		{!! Form::select('student_id', $students, null, ['class' => 'form-control', 'placeholder' =>'--Selecione um Estudiante--', 'required']) !!}
	</div>

	<div class="form-group col">
		{!! Form::label('status', 'Estado') !!}
		{!! Form::select('status', [''=> '--Selecionar estado--','0' => 'Inativo', '1' => 'Ativo'], null, ['class' => 'form-control']) !!}
	</div>
</div>


<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-success btn-sm float-left']) !!}
</div>


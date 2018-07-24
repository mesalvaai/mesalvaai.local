{!! Form::hidden('user_id', $encrypted) !!}
{!! Form::hidden('user_id', $decrypted) !!}


{{-- {!! Form::text('user_id', $idUser) !!} --}}
<div class="row">
	<div class="form-group col-xs-12 col-md">
		{!! Form::label('name', 'Nome Completo') !!}
		{!! Form::text('name', Auth::user()->name, ['class' => 'form-control', 'required']) !!}
	</div>

	{{-- <div class="form-group col-xs-12 col-md">
		{!! Form::label('cpf', 'CPF') !!}
		{!! Form::text('cpf', null, ['class' => 'form-control', 'placeholder' => '000.000.000-00', 'required']) !!}
	</div> --}}

	<div class="form-group col-xs-12 col-md">
		{!! Form::label('email', 'Email') !!}
		{!! Form::email('email', Auth::user()->email, ['class' => 'form-control', 'required']) !!}
		<small id="emailHelp" class="form-text text-muted">As notificações de sua campanha serão enviadas para este e-mail. Se quiser pode alterar o e-mail cadastrado <a href="#" title="Alterar E-mail">aqui</a>.</small>
	</div>

	<div class="form-group col-xs-12 col-md col-lg-3">
		{!! Form::label('phone', 'Telefone') !!}
		{!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '(75) 00000-0000', 'required']) !!}
	</div>
</div>

{{-- <div class="row">
	<div class="form-group col-xs-12 col-md">
		{!! Form::label('institution', 'Instituição de Ensino*') !!}
		{!! Form::text('institution', null, ['class' => 'form-control', 'required']) !!}
	</div>
	<div class="form-group col-xs-12 col-md">
		{!! Form::label('course_id', 'Curso') !!}
		{!! Form::text('course_id', null,['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group col-xs-12 col-md">
		{!! Form::label('period_id', 'Período') !!}
		{!! Form::text('period_id', null, ['class' => 'form-control','required']) !!}
	</div>
</div>
 --}}
<div class="row">
	<div class="form-group col-xs-12 col-md">
		{!! Form::label('how_met_us', 'Como conheceu a Me Salva Aí? *') !!}
		{!! Form::select('how_met_us', [''=> 'Selecione','google' => 'Google', 'facebook' => 'Facebook', 'e-mail' => 'E-mail', 'amigos' => 'Um amigo', 'outros' => 'Outros'], null, ['class' => 'form-control', 'required']) !!}
	</div>
	<div class="form-group col-xs-12 col-md">
		{!! Form::label('state', 'Estado') !!}
		{!! Form::select('state_id',$states, null, ['placeholder' => '-- Selecione um estado --', 'class' => 'form-control', 'required']) !!}
	</div>
	<div class="form-group col-xs-12 col-md">
		{!! Form::label('cidade_id', 'Cidade') !!}
		{!! Form::select('city_id',$cities, null, ['placeholder' => '-- Selecione uma cidade --', 'class' => 'form-control', 'required']) !!}
	</div>
</div>

<div class="row">
	{{-- <div class="form-group col-xs-12 col-md">
		{!! Form::label('street', 'Rua') !!}
		{!! Form::text('street', null, ['class' => 'form-control', 'required']) !!}
	</div> --}}

	{{-- <div class="form-group col-xs-12 col-md">
		{!! Form::label('number', 'Número') !!}
		{!! Form::text('number', null, ['class' => 'form-control', 'required']) !!}
	</div> --}}

	{{-- <div class="form-group col-xs-12 col-md">
		{!! Form::label('neighborhood', 'Bairro') !!}
		{!! Form::text('neighborhood', null, ['class' => 'form-control', 'required']) !!}
	</div>

	<div class="form-group col-xs-12 col-md">
		{!! Form::label('complement', 'Complemento') !!}
		{!! Form::text('complement', null, ['class' => 'form-control', 'required']) !!}
	</div> --}}
	
	{!! Form::hidden('status', 1) !!}
	{{-- <div class="form-group col-md-2">
		{!! Form::label('status', 'Situação') !!}
		{!! Form::select('status', [''=> 'Selecione','0' => 'Inativo', '1' => 'Ativo'], null, ['class' => 'form-control', 'required']) !!}
	</div> --}}
</div>

<div class="form-group">
	{!! Form::submit('Criar Campanha', ['class' => 'btn btn-msa btn-sm float-left']) !!}
</div>
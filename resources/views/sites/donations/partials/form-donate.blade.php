{{-- {!! Form::hidden('user_id', $encrypted) !!}
{!! Form::hidden('user_id', $decrypted) !!} --}}
<div class="form-group row">
    {!! Form::label('full_name', 'Nome completo', ['class' => 'col-sm-3 col-form-label'] ) !!}
    <div class="col-sm-9">
      	{!! Form::text('full_name', null, ['class' => $errors->has('full_name') ? 'form-control is-invalid' : 'form-control']) !!}
      	@if ($errors->has('full_name'))
        	<span class="invalid-feedback" style="display: block;">
            	<strong>{{ $errors->first('full_name') }}</strong>
        	</span>
    	@endif
    </div>
</div>

<div class="form-group row">
    {!! Form::label('email', 'E-mail', ['class' => 'col-sm-3 col-form-label'] ) !!}
    <div class="col-sm-9">
      	{!! Form::email('email', null, ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control']) !!}
      	@if ($errors->has('email'))
        	<span class="invalid-feedback" style="display: block;">
            	<strong>{{ $errors->first('email') }}</strong>
        	</span>
    	@endif
    </div>
</div>

<div class="form-group row">
    {!! Form::label('data_of_birth', 'E-mail', ['class' => 'col-sm-3 col-form-label'] ) !!}
    <div class="col-sm-4">
      	{!! Form::date('data_of_birth', null, ['class' => $errors->has('data_of_birth') ? 'form-control is-invalid' : 'form-control']) !!}
      	@if ($errors->has('data_of_birth'))
        	<span class="invalid-feedback" style="display: block;">
            	<strong>{{ $errors->first('data_of_birth') }}</strong>
        	</span>
    	@endif
    </div>
</div>

<div class="form-group row">
    {!! Form::label('celular', 'Celular', ['class' => 'col-sm-3 col-form-label'] ) !!}
    <div class="col-sm-4">
      	{!! Form::text('celular', null, ['class' => $errors->has('celular') ? 'form-control is-invalid' : 'form-control']) !!}
      	@if ($errors->has('celular'))
        	<span class="invalid-feedback" style="display: block;">
            	<strong>{{ $errors->first('celular') }}</strong>
        	</span>
    	@endif
    </div>
</div>

<div class="form-group row">
    {!! Form::label('cpf', 'CPF', ['class' => 'col-sm-3 col-form-label'] ) !!}
    <div class="col-sm-4">
      	{!! Form::text('cpf', null, ['class' => $errors->has('cpf') ? 'form-control is-invalid' : 'form-control']) !!}
      	@if ($errors->has('cpf'))
        	<span class="invalid-feedback" style="display: block;">
            	<strong>{{ $errors->first('cpf') }}</strong>
        	</span>
    	@endif
    </div>
</div>


<div class="form-group pb-4">
	<h2 class="font-weight-normal">{!! Form::label('title', 'Indique a quantia da Doação') !!}</h2>
	<div class="input-group col-md-6">
	  	<div class="input-group-prepend">
	    	<span class="input-group-text">$R</span>
	    	<span class="input-group-text">0,00</span>
	  	</div>
		{!! Form::text('total_amount', null, ['class' => $errors->has('total_amount') ? 'form-control is-invalid' : 'form-control','id' => 'total_amount', 'required']) !!}
	</div>
	<small class="text-muted">(mínimo de R$20,00) </small><br>
	@if ($errors->has('total_amount'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('total_amount') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">{{-- 
	{!! Form::label('full_name', 'Nome completo') !!} --}}
    <div class="custom-file">
        {{-- <input type="file" class="custom-file-input" id="inputGroupFile02"/> --}}
        {!! Form::text('full_name', null, ['class' => $errors->has('full_name') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'NOME COMPLETO']) !!}
    </div>
    @if ($errors->has('full_name'))
        <span class="invalid-feedback" style="display: block;">
            <strong>{{ $errors->first('full_name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">{{-- 
	{!! Form::label('full_name', 'Nome completo') !!} --}}
    <div class="custom-file">
        {{-- <input type="file" class="custom-file-input" id="inputGroupFile02"/> --}}
        {!! Form::text('full_name', null, ['class' => $errors->has('full_name') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'NUMERO DO CARTÃO']) !!}
    </div>
    @if ($errors->has('full_name'))
        <span class="invalid-feedback" style="display: block;">
            <strong>{{ $errors->first('full_name') }}</strong>
        </span>
    @endif
</div>

<div class="row">
	<div class="col-md">
		<div class="form-group">{{-- 
			{!! Form::label('full_name', 'Nome completo') !!} --}}
		    <div class="custom-file">
		        {{-- <input type="file" class="custom-file-input" id="inputGroupFile02"/> --}}
		        {!! Form::text('full_name', null, ['class' => $errors->has('full_name') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'MM']) !!}
		    </div>
		    @if ($errors->has('full_name'))
		        <span class="invalid-feedback" style="display: block;">
		            <strong>{{ $errors->first('full_name') }}</strong>
		        </span>
		    @endif
		</div>
	</div>
	<b>/</b>
	<div class="col-md">
		<div class="form-group">{{-- 
			{!! Form::label('full_name', 'Nome completo') !!} --}}
		    <div class="custom-file">
		        {{-- <input type="file" class="custom-file-input" id="inputGroupFile02"/> --}}
		        {!! Form::text('full_name', null, ['class' => $errors->has('full_name') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'AA']) !!}
		    </div>
		    @if ($errors->has('full_name'))
		        <span class="invalid-feedback" style="display: block;">
		            <strong>{{ $errors->first('full_name') }}</strong>
		        </span>
		    @endif
		</div>
	</div>

	<div class="col-md">
		<div class="form-group">{{-- 
			{!! Form::label('full_name', 'Nome completo') !!} --}}
		    <div class="custom-file">
		        {{-- <input type="file" class="custom-file-input" id="inputGroupFile02"/> --}}
		        {!! Form::text('full_name', null, ['class' => $errors->has('full_name') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'CVV']) !!}
		    </div>
		    @if ($errors->has('full_name'))
		        <span class="invalid-feedback" style="display: block;">
		            <strong>{{ $errors->first('full_name') }}</strong>
		        </span>
		    @endif
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md">
		<div class="form-group">{{-- 
			{!! Form::label('full_name', 'Nome completo') !!} --}}
		    <div class="custom-file">
		        {{-- <input type="file" class="custom-file-input" id="inputGroupFile02"/> --}}
		        {!! Form::text('full_name', null, ['class' => $errors->has('full_name') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'PAIS']) !!}
		    </div>
		    @if ($errors->has('full_name'))
		        <span class="invalid-feedback" style="display: block;">
		            <strong>{{ $errors->first('full_name') }}</strong>
		        </span>
		    @endif
		</div>
	</div>
	<div class="col-md">
		<div class="form-group">{{-- 
			{!! Form::label('full_name', 'Nome completo') !!} --}}
		    <div class="custom-file">
		        {{-- <input type="file" class="custom-file-input" id="inputGroupFile02"/> --}}
		        {!! Form::text('full_name', null, ['class' => $errors->has('full_name') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'DIREÇÃO DE FATURAÇÃO']) !!}
		    </div>
		    @if ($errors->has('full_name'))
		        <span class="invalid-feedback" style="display: block;">
		            <strong>{{ $errors->first('full_name') }}</strong>
		        </span>
		    @endif
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md">
		<div class="form-group">{{-- 
			{!! Form::label('full_name', 'Nome completo') !!} --}}
		    <div class="custom-file">
		        {{-- <input type="file" class="custom-file-input" id="inputGroupFile02"/> --}}
		        {!! Form::text('full_name', null, ['class' => $errors->has('full_name') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'ESTADO']) !!}
		    </div>
		    @if ($errors->has('full_name'))
		        <span class="invalid-feedback" style="display: block;">
		            <strong>{{ $errors->first('full_name') }}</strong>
		        </span>
		    @endif
		</div>
	</div>
	<div class="col-md">
		<div class="form-group">{{-- 
			{!! Form::label('full_name', 'Nome completo') !!} --}}
		    <div class="custom-file">
		        {{-- <input type="file" class="custom-file-input" id="inputGroupFile02"/> --}}
		        {!! Form::text('full_name', null, ['class' => $errors->has('full_name') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'CIDADE']) !!}
		    </div>
		    @if ($errors->has('full_name'))
		        <span class="invalid-feedback" style="display: block;">
		            <strong>{{ $errors->first('full_name') }}</strong>
		        </span>
		    @endif
		</div>
	</div>

	<div class="col-md">
		<div class="form-group">{{-- 
			{!! Form::label('full_name', 'Nome completo') !!} --}}
		    <div class="custom-file">
		        {{-- <input type="file" class="custom-file-input" id="inputGroupFile02"/> --}}
		        {!! Form::text('full_name', null, ['class' => $errors->has('full_name') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'CODIGO POSTAL']) !!}
		    </div>
		    @if ($errors->has('full_name'))
		        <span class="invalid-feedback" style="display: block;">
		            <strong>{{ $errors->first('full_name') }}</strong>
		        </span>
		    @endif
		</div>
	</div>
</div>



{!! Form::hidden('student_id', (session()->has('student_id')) ? session()->get('student_id') : $campanha->student_id, ['readonly']) !!}

<div class="row">{{-- 
	<div class="col-md">
		{{ Form::button('Aicionar recompensas (opcional)', ['type' => 'submit', 'name' =>'op', 'value' => 'add_r', 'class' => 'btn btn-success btn-sm w-100'] )  }}
	</div> --}}
	<div class="col-md">
		{{ Form::button('CONTINUAR', ['type' => 'submit', 'name' =>'op', 'value' => 'add', 'class' => 'btn btn-msa btn-sm w-100'] )  }}
	</div>{{-- 
	<div class="col-md">
		{{ Form::button('Visualizar e lançar seu campanha', ['type' => 'submit', 'name' =>'op', 'value' => 'show_c', 'class' => 'btn btn-info btn-sm w-100'] )  }}
	</div> --}}
</div>

@section('scripts')
  	<script src="{{ asset('site//lib/maskMoney/jquery.maskMoney.min.js') }}" type="text/javascript"></script>
	<script>
		$("#total_amount").maskMoney();
	</script>
@endsection


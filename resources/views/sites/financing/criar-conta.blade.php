@extends('layouts.site.app', ['title' => 'ME SALVA AI'])

@section('content')
<section id="painel-fc" class="painel-fc">
	<div class="painel-fc-bg">
		<div class="container text-center">
			<h1 class="text-white">O fim da complexidade</h1>
		</div>
	</div>
</section>

<section class="pt-5 pb-5">
	<div class="container" align="center">
		<div class="col-md-6" align="left">
			<div class="card">
				<div class="card-header">
					<h3 class="text-msa">Cadastre-se</h3>
				</div>
				<div class="card-body">
					<form method="POST" action="{{ route('register') }}" >

						@csrf

						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
							<div class="col-md-6">
								<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
								@if ($errors->has('name'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
							<div class="col-md-6">
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
								@if ($errors->has('email'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>
							<div class="col-md-6">
								<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
								@if ($errors->has('password'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar senha') }}</label>
							<div class="col-md-6">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-msa">
									{{ __('Cadastrar') }}
								</button>
							</div>
						</div> 
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
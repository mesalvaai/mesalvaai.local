@extends('layouts.site.app', ['title' => 'ME SALVA AI'])

@section('content')
<section id="painel-fc" class="painel-fc">
	<div class="painel-fc-bg">
		<div class="container text-center">
			<h1 class="text-white">O fim da complexidade</h1>
		</div>
	</div>
</section>

<section  id="texto">

</section>
<section class="pt-5 pb-5">
	<div class="container" align="center">	
		<div class="col-md-6" align="left">
			<div class="card">
				<div class="card-header">
					<h3 class="text-msa">Entrar</h3>
				</div>
				<div class="card-body">
					<form method="POST" action="{{ route('login') }}">
						@csrf

						<div class="form-group row">
							<label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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
							<div class="col-md-6 offset-md-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Mantenha-me conectado') }}
									</label>
								</div>
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="col-md-8 offset-md-4">
								<button type="submit" class="btn btn-msa">
									{{ __('Login') }}
								</button>

								<a class="btn btn-link" href="{{ route('password.request') }}">
									{{ __('esqueceu sua senha?') }}
								</a>
							</div>

							<div  class="col-md-12" align="center" style="margin-top: 25px;">
								<small>Não possui uma conta? </small><a class="btn-link" href="{{ url('/financiamento/criar-conta') }}" class="signup">Cadastre-se</a>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-12" >
				<div style="margin-top: 15px;">
					<small><p>Já pensou em fazer sua graduação perto de você e com desconto? E ser mimado enquanto está na faculdade? Ou ainda ter seu curso 100% pago? Com a Me Salva Aí tudo ficou mais fácil, Comece sua trajetória com propósito! Busque sua bolsa de estudo. <a href="/" title="">Ver Mais</a></p></small>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
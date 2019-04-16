@extends('layouts.painel.access')

@section('content')
<div class="container">
    <div class="form-outer text-center d-flex align-items-center">
        <div class="form-inner">
            <div class="logo text-uppercase"><span>SYSTEM OF</span><strong class="text-primary"> AUTENTICATION</strong></div>
            <p>Já pensou em fazer sua graduação perto de você e com desconto? E ser mimado enquanto está na faculdade? Ou ainda ter seu curso 100% pago? Com a Me Salva Aí tudo ficou mais fácil, Comece sua trajetória com propósito! Busque sua bolsa de estudo. <a href="/" title="">Ver Mais</a></p>
            <form method="POST" class="text-left form-validate" action="{{ route('login') }}">
                @csrf
                <div class="form-group-material">
                    <input id="email" type="email" name="email" required data-msg="Please enter your e-mail" class="input-material {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>
                    <label for="login-username" class="label-material">{{ __('E-Mail Address') }}</label>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group-material">
                    <input id="password" type="password" name="password" required data-msg="Please enter your password" class="input-material {{ $errors->has('password') ? ' is-invalid' : '' }}" required="">
                    <label for="login-password" class="label-material">{{ __('Password') }}</label>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group-material">
                        <div class="col-md-6 offset-md-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </form>
            <a href="{{ route('password.request') }}" class="forgot-pass">Esqueceu a senha?</a><small>Não possui uma conta? </small><a href="{{ url('cadastrar') }}" class="signup">Cadastre-se</a>
        </div>
        <div class="copyrights text-center">
            <p>Technology <a href="https://getbootstrap.com/" class="external">Bootstrap V4.*</a></p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </div>
    </div>
</div>
@endsection

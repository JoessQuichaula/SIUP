@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<div class="container">
    <br>
    <hr>

    <div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Criar Conta</h4>
        <p class="text-center">Começe criando a sua conta de forma gratuita</p>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
          @csrf
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
             </div>
            <input name="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nome Completo" type="text" required autocomplete="name" autofocus>
            @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
        </div>


        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
             </div>
            <input name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Endereço de Email" type="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
            </div>
            <select class="custom-select" style="max-width: 120px;">
                <option selected="">+244</option>
            </select>
            <input name="telemovel" placeholder="Número de Telemóvel" type="text" class="form-control @error('telemovel') is-invalid @enderror"  value="{{ old('telemovel') }}" required autocomplete="telemovel">
            @error('telemovel')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-building"></i> </span>
            </div>
            <input name="bilhete_identidade" placeholder="Nº do Bilhete de Identidade" type="text" class="form-control @error('bilhete_identidade') is-invalid @enderror" value="{{ old('bilhete_identidade') }}" required autocomplete="bilhete_identidade">
            @error('bilhete_identidade')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input name="password" placeholder="Palavra-Passe" type="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input name="password_confirmation" class="form-control" placeholder="Repetir Palavra-Passe" type="password" required autocomplete="new-password">
        </div>
        <label>Bilhete de Identidade(PDF)</label>
        <br>
        <div class="form-group input-group">

            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-upload"></i> </span>
            </div>
            <input id="ficheiro" type="file" class="form-control @error('file') is-invalid @enderror" name="ficheiro" value="{{ old('file') }}" required autocomplete="file">
            @error('file')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" id="btnLogin">Criar Conta</button>
        </div>

        <p class="text-center">Já associou a sua conta? <a href="http://siup.test/login" id="btnLink">Entrar</a> </p>
    </form>
    </article>
    </div> <!-- card.// -->

    </div>


    <!--
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telemovel" class="col-md-4 col-form-label text-md-right">{{ __('telemovel') }}</label>

                            <div class="col-md-6">
                                <input id="telemovel" type="text" class="form-control @error('telemovel') is-invalid @enderror" name="telemovel" value="{{ old('telemovel') }}" required autocomplete="telemovel">

                                @error('telemovel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bilhete_identidade" class="col-md-4 col-form-label text-md-right">{{ __('bilhete_identidade') }}</label>

                            <div class="col-md-6">
                                <input id="bilhete_identidade" type="text" class="form-control @error('bilhete_identidade') is-invalid @enderror" name="bilhete_identidade" value="{{ old('bilhete_identidade') }}" required autocomplete="bilhete_identidade">

                                @error('bilhete_identidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Ficheiro') }}</label>

                            <div class="col-md-6">
                                <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}" required autocomplete="file">

                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
@endsection

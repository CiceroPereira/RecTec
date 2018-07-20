@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="jumbotron">

                <div style="text-align: center">
                     <img src="img\logo.png" height="132px" width= "100px">
                </div>
                

                <div class="form-group" style="text-align: center; margin-top: 10px">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                            <div class="input-group" style="text-align: center">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Nome" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-group" style="margin-top: 5px">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-group" style="margin-top: 5px">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Senha" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-group" style="margin-top: 5px">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Senha" required>
                            </div>
                        
                        
                            <div style="margin-top: 10px" class="col-xs-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Cadastrar') }}
                                </button>
                            </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
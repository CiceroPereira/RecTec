@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="jumbotron" style="margin: 50px auto; width: 320px;">

                <div style="text-align: center; margin-top: 5px">
                     <img src="img/logo.png" height="132px" width= "100px">
                </div>


                <div class="form-group" style="text-align: center; margin-top: 30px; margin-bottom: 50px">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="input-group" style="text-align: center">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="input-group-addon">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-group" style="margin-top: 5px">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Senha" required>

                                @if ($errors->has('password'))
                                    <span class="input-group-addon">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div style="margin-top: 10px" class="col-xs-12">
                                <button type="submit" class="btn btn-primary" style="width: 49%">
                                    {{ __('Entrar') }}
                                </button>
                    
                                <a href="{{url('/register')}}" class="btn btn-success" style="width: 49%" >Cadastrar</a>

                                   <div class="input-group" style="margin-top: 15px; text-align: right;">
                           
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            
                        </div>
                               
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

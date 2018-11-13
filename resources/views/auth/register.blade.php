@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="jumbotron">
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                @endif
                 <div style="text-align: center">
                     <img src="img/rectec.png" height="156px" width= "250px">
                </div>
                
                <div style="text-align: center;"><h3 style="opacity: 0.6">Novo medidor</h3></div>
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
                                <input id="cpf" type="number" pattern="[0-9]" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ old('cpf') }}" placeholder="CPF" required autofocus>

                                @if ($errors->has('cpf'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cpf') }}</strong>
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
                                <input id="endereco" class="form-control{{ $errors->has('endereco') ? ' is-invalid' : '' }}" name="endereco" value="{{ old('endereco') }}" placeholder="Endereço" required>

                                @if ($errors->has('endereco'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('endereco') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="input-group" style="margin-top: 5px">
                            
                                <select name="id_perfil" id="id_perfil" class="form-control" required="required">
                                    <option style="display:none;" selected disabled value="">Perfil</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Registrador</option>
                                </select>
                          </div>

                            <div class="input-group" style="margin-top: 5px">
                            
                               <select name="id_profissao" id="id_profissao" class="form-control" required="required">
                                    <option style="display:none;" selected disabled value="">Profissão</option>
                                @foreach($all as $profissoes)
                                    <option value="{{$profissoes->id}}">{{$profissoes->descricao}}</option>
                                    @endforeach
                                </select>
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
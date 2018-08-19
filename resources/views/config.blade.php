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
                
                <div style="text-align: center;"><h3 style="opacity: 0.6">Usuário e Pluviometros</h3></div>
                <div class="form-group" style="text-align: center; margin-top: 10px">
                    <form method="POST" action="{{url('/configurar/insert')}}">
                        @csrf
                        <div class="input-group" style="margin-top: 5px">
                            
                               <select name="user_id" id="user_id" class="form-control" required="required">
                                @foreach($all as $users)
                                    @if($users->id_perfil != 1)
                                    <option value="{{$users->id}}">{{$users->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                          </div>

                            <div class="input-group" style="margin-top: 5px">
                            
                               <select name="pluviometro_id" id="pluviometro_id" class="form-control" required="required">
                                @foreach($pluviometro as $pluviometros)
                                    <option value="{{$pluviometros->id}}">{{$pluviometros->pluviometroId}}</option>
                                    @endforeach
                                </select>
                          </div>

                          <div style="margin-top: 10px" class="col-xs-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Confirmar') }}
                                </button>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
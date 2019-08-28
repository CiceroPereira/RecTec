@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Novo Pluviometro</div>
                 @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                @endif

                <div class="card-body">
                   <form method="post" action="{{url('/pluviometro')}}">
                    @csrf
                        <div class="form-group">
                            <label>Nome</label>
                            <input name="nome" class="form-control" required="required" >
                            
                        </div>


                        <div class="form-group">
                            <label>Data de instalação</label>
                            <input class="form-control" type="date" name="data" value="{{ date('Y-m-d') }}">
                       </div>


                        <div class="form-group">
                         
                            <label>Modelo</label>
                            <select name="tipo" id="tipo" class="form-control" required="required">
                                @foreach($all as $modelo )
                                   
                                      <option value="{{ $modelo->id }}" title="{{$modelo->descricao}}">{{ $modelo->tipo }}</option>
                

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Latitude</label>
                            <input class="form-control" type="number" step="any" name="latitude" required="required">
                        </div>

                        <div class="form-group">
                            <label>Longitude</label>
                            <input class="form-control" type="number" step="any" name="longitude" required="required">
                        </div>

                        
                    
                         <button class="btn btn-block btn-primary">Salvar</button>

                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

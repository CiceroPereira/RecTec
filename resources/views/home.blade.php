@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pluviometria</div>
                 @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                @endif

                <div class="card-body">
                   <form method="post" action="{{url('/')}}">
                    @csrf
                    {{json_encode($errors->all())}}
                        <div class="form-group">
                            <label>Nome</label>
                            <input name="nome" class="form-control" readonly="readonly" value="{{{Auth::user()->name}}}">
                            
                        </div>

                        <div class="form-group">
                         
                            <label>Pluviometro</label>
                            <select name="pluviometro_id" id="pluviometro" class="form-control">
                                @foreach($all as $pluviometro )
                                  @foreach($tipo as $type )
                                    @if($type->id == $pluviometro->modelo_id)
                                      @break
                                      @endif
                                  @endforeach
                                <option value="{{ $pluviometro->id }}">{{ $pluviometro->pluviometroId }} : {{$type->tipo}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Data</label>
                            <input class="form-control" type="date" name="data" value="{{ date('Y-m-d') }}">
                       </div>

                       <div class="form-group">
                          <label>Hora</label>
                            <input class="form-control" type="time" name="hora" value="{{ date('H:i') }}">
                       </div>

                        <div class="form-group">
                            <label>Lâmina(mm)</label>
                            <input class="form-control" type="number" step="any" name="lamina" required="required">
                        </div>

                        <div class="form-group">
                             <input class="form-control" type="number" hidden="hidden" name="user_id" value="{{{Auth::user()->id}}}">
                         </div>
                    
                         <button class="btn btn-block btn-primary">Salvar</button>

                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

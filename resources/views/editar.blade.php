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
                   <form method="post" action="{{url('/edit/'.$dado->id)}}">
                    {{method_field('PUT')}}
                    @csrf

                        <div class="form-group">
                         
                            <label>Pluviometro</label>
                            <select name="pluviometro_id" id="pluviometro" class="form-control" required="required">
                                @foreach($all as $pluviometro )
                                  @foreach($tipo as $type )
                                    @if($type->id == $pluviometro->modelo_id)
                                      @break
                                      @endif
                                  @endforeach

                                    @if(Auth::user()->id_perfil == 1 )
                                      <option value="{{ $pluviometro->id }}">{{ $pluviometro->pluviometroId }} : {{$type->tipo}}</option>
                                      @else
                                        @foreach($medidor as $medidores)
                                          @if($pluviometro->id == $medidores->pluviometro_id)
                                             <option value="{{ $pluviometro->id }}">{{ $pluviometro->pluviometroId }} : {{$type->tipo}}</option>
                                          @endif
                                        @endforeach

                                    @endif

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Data</label>
                            <input class="form-control" type="date" name="data" value="{{old('data', $dado->data)}}">
                       </div>

                       <div class="form-group">
                          <label>Hora</label>
                            <input class="form-control" type="time" name="hora" value="{{old('hora', $dado->hora)}}">
                       </div>

                        <div class="form-group">
                            <label>Lâmina(mm)</label>
                            <input class="form-control" type="number" step="any" name="lamina" required="required">
                        </div>

                        <div class="form-group">
                             <input class="form-control" type="number" hidden="hidden" name="user_id" value="{{old('hora', $dado->user_id)}}">
                         </div>
                    
                         <button class="btn btn-block btn-primary">Salvar</button>

                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

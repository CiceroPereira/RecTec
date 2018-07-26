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
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label>Nome</label>
                            <input name="nome" class="form-control" readonly="readonly" value="{{{Auth::user()->name}}}">
                            
                        </div>

                        <div class="form-group">
                            <label>Pluviometro</label>
                            <select class="form-control" name="pluviometro_id">
                              <option value="1">2018-prae-01</option>
                              <option value="2">2018-prae-02</option>
                              <option value="3">2018-dois-irmaos-01</option>
                              <option value="4">2018-nazare-01</option>
                              <option value="5">2018-nazare-02</option>
                              <option value="6">2018-nazare-03</option>
                              <option value="7">0000-pesqueira-01</option>
                              <option value="8">0000-pesqueira-02</option>
                              <option value="9">0000-pesqueira-03</option>
                              <option value="10">0000-pesqueira-04</option>
                              <option value="11">0000-pesqueira-05</option>
                              <option value="12">0000-pesqueria-06</option>
                              <option value="13">0000-pesqueria-07</option>
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
                            <input class="form-control" type="number" step="any" name="lamina">
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

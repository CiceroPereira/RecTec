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
                              <option value="7">2010-pesqueira-01</option>
                              <option value="8">2010-pesqueira-02</option>
                              <option value="9">2010-pesqueira-03</option>
                              <option value="10">2010-pesqueira-05</option>
                              <option value="11">2010-pesqueira-06</option>
                              <option value="12">2010-pesqueria-07</option>
                              <option value="13">2010-pesqueria-08</option>
                              <option value="14">2014-automático-01</option>
                              <option value="15">2014-automático-02</option>
                              <option value="16">2014-automático-03</option>
                              <option value="17">2014-automático-04</option>
                              <option value="18">2014-automático-05</option>
                              <option value="19">2014-automático-06</option>
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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pluviometria</div>

                <div class="card-body">
                   <form>
                        <div class="form-group">
                            <label>Nome</label>
                            <input name="nome" class="form-control" readonly="readonly" value="{{{Auth::user()->name}}}">
                            
                        </div>

                        <div class="form-group">
                            <label>Pluviometro</label>
                            <select class="form-control" name="pluviometro">
                              <option value="volvo">Volvo</option>
                              <option value="saab">Saab</option>
                              <option value="mercedes">Mercedes</option>
                              <option value="audi">Audi</option>
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
                            <input class="form-control" type="number" step="any" name="volume">
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

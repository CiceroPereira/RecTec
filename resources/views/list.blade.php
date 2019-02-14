@extends('layouts.app')

@section('content')
<div class="container">
		<div class="table-responsive">
			<div class="row jumbotron" style="padding: 4px">
				<!--
				<div class="col-sm-2 form-group">
					<input type="date" name="data1" class="form-control" placeholder="Data de inicio">
				</div>
				<div class="col-sm-2 form-group">
					<input type="date" name="data2" class="form-control">
				</div>
				
-->				
				
					<div class="col-sm-6 form-group">
					<label>Consultar por:</label>
					<select name="change" id="change" class="form-control">   
								<option value="" selected="selected"></option>	  
	                            <option value="consulta_nome">Nome</option>
	                            <option value="consulta_tipo">Tipo</option>
	                            <option value="consulta_data">Data(intervalo)</option>
	                    </select>

	                  	<button id="submit" class="btn btn-primary" style="margin-top: 5px">Mostrar formulário</button>
	                </div>    

				<div class="col-sm-6 form-group" name="consulta_nome" id="consulta_nome" style="display: none">
				<label>Nome:</label>
				<form method="get" action="{{url('/getnomes')}}">
				 @csrf
					<select name="user_id" id="user_id" class="form-control" required="required">
                                @foreach($names as $users)
                                    <option value="{{$users->id}}">{{$users->name}}</option>
                                   
                                 @endforeach
                    </select>

                    <button class="btn btn-primary" style="margin-top: 5px">Cosultar</button>			
				</form>
				</div>

				<div class="col-sm-6 form-group" name="consulta_data" id="consulta_data" style="display: none">
				<label>Data(intervalo):</label>
				<form method="get" action="{{url('/getdatas')}}">
				 @csrf
				 <div class="row">
					<div class="col-sm-6">
						<input type="date" class="form-control" name="date_one" required="required">
					</div>
					<div class="col-sm-6">
						<input type="date" class="form-control" name="date_two" required="required">
					</div>
				</div>
                    <button class="btn btn-primary" style="margin-top: 5px">Cosultar</button>			
				</form>
				</div>

				<div class="col-sm-6 form-group" name="consulta_tipo" id="consulta_tipo" style="display: none">
				<label>Tipo:</label>
				<form method="get" action="{{url('/gettipo')}}">
				 @csrf
					<select name="pluviometro_id" id="pluviometro_id" class="form-control" required="required">
                                @foreach($modelo as $modelos)
                                    <option value="{{$modelos->id}}">{{$modelos->tipo}}</option>
                                   
                                 @endforeach
                    </select>

                    <button class="btn btn-primary" style="margin-top: 5px">Cosultar</button>			
				</form>
				</div>


			</div>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Data</th>
						<th>Hora</th>
						<th>Lâmina(mm)</th>
						<th>Pluviômetro(tipo)</th>
						<th colspan="2">Ações</th>
					</tr>
				</thead>
				<tbody>
				@foreach($all as $dados)
					<tr>
						
						<td>{{$dados->user->name}}</td>
						<td>{{$dados->data}}</td>
						<td>{{$dados->hora}}</td>
						<td>{{$dados->lamina}}mm</td>
						<td>{{$dados->pluviometro->modelo->tipo}}</td>
						@if(Auth::user()->id_perfil == 1 || Auth::user()->id == $dados->user_id)
						<td style="text-align: center;">
							<a href="{{url('/edit', $dados->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
						</td>
						<td style="text-align: center">
							<form onsubmit="return confirm('Deseja mesmo deletar o registro(não poderá ser desfeito)?');" action="{{ url('/listar/delete' , $dados->id ) }}" method="POST">
	    						{{ csrf_field() }}
	    						{{ method_field('DELETE') }}
	    						<button class="btn btn-danger"><i class="fa fa-trash"></i></button>
							</form>
						</td>
						@else
						<td style="text-align: center;">
							<button class="btn btn-primary" disabled="disabled"  title="Você não tem permissão pra editar este registro"><i class="fa fa-edit"></i></button>
						</td>
						<td style="text-align: center">
	    						<button class="btn btn-danger" disabled="disabled"  title="Você não tem permissão pra excluir este registro"><i class="fa fa-trash"></i></button>
						</td>
						@endif
					</tr>
				@endforeach	
				</tbody>
			</table>
			
			{{ $all->appends(Request::except('page'))->render() }}

		</div>
	</div>
@endsection
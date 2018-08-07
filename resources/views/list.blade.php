@extends('layouts.app')

@section('content')
<div class="container">
		<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Data</th>
						<th>Hora</th>
						<th>Lâmina(mm)</th>
						<th colspan="2">Ações</th>
					</tr>
				</thead>
				<tbody>
				@foreach($all as $dados)
					<tr>
						<td>{{$dados->data}}</td>
						<td>{{$dados->hora}}</td>
						<td>{{$dados->lamina}}mm</td>
						@if(Auth::user()->id == 1 || Auth::user()->id == $dados->user_id)
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
			
			{{ $all->links() }}

		</div>
	</div>
@endsection
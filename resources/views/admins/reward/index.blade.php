@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">

				<div class="card-header">
					Recompensa
					<a href="{{ route('rewards.create') }}" class="btn btn-outline-info btn-sm float-right">Nova Recompensa</a>
				</div>

				<div class="card-body">
					@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"/>
						<span aria-hidden="true">&times;</span>
					</div>
					@endif

					<div class="table-responsive">
						<table class="table table-striped table-bordered table-sm">
							<thead>
								<tr>
									<th>Id</th>
									<th>Nome do Usuario</th>
									<th>Titulo</th>
									<th>doação</th>
									<th>quantidade</th>
									<th>ilimitado</th>
									<th>data de entrega</th>
									<th>modo de entrega</th>
									<th>variações</th>

									<th colspan="3">Opçōes</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($rewards as $reward)
								<tr>
									<td>{{ $reward->id }}</td>
									<td>{{ $reward->name }}</td>
									<td>{{ $reward->title }}</td>
									<td> R$ {{ $reward->donation }}</td>
									<td>{{ $reward->quantity }}</td>
									<td>{{ $reward->unlimited }}</td>
									<td>{{ $reward->delivery_date }}</td>
									<td>{{ $reward->delivery_mode }}</td>
									<td>{{ ($reward->variations == 1 ? 'Sim' : 'Não') }}</td>	
                                    <td class="float-right">
										<a href="{{ route('donations.confirmed', $reward->id) }}" class="btn btn-outline-primary"><i class="fa fa-check"></i>Escolher e ir para doação</a>
									</td>
									<td class="float-right">
										<a href="{{ route('rewards.show', $reward->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-eye"></i></a>
									</td>
									<td class="float-right">
										<a href="{{ route('rewards.edit', $reward->id) }}" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit"></i></a>
									</td>
									<td class="float-right">
										{!! Form::open(['route' => ['rewards.destroy', $reward->id] , 'method' => 'DELETE']) !!}
										<button class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
										{!! Form::close() !!}
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
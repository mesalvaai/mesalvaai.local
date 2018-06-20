@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">

				<div class="card-header">
					Doações
					<a href="{{ route('donations.create') }}" class="btn btn-outline-info btn-sm float-right">Nova doação</a>
				</div>

				<div class="card-body">
					@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</div>
						@endif

						<table class="table table-striped table-bordered table-sm">
							<table class="table table-striped table-bordered">
								<caption>Lista de doações</caption>
								<thead>
									<tr>
										<th>Id</th>
										<th>Nome</th>
										<th>pais</th>
										<th>email</th>
										<th>detalhes</th>
										<th>data da doação</th>
										<th>cep</th>
										<th>valor total</th>

										<th colspan="3">Opçōes</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($donations as $donation)
									<tr>
										<td>{{ $donation->id }}</td>
										<td>{{ $donation->full_name }}</td>
										<td>{{ $donation->country }}</td>
										<td>{{ $donation->email }}</td>
										<td>{{ $donation->details }}</td>
										<td>{{ $donation->donation_date }}</td>
										<td>{{ $donation->postal_code }}</td>
										<td>{{ $donation->total_amount }}</td>
										<td>
											<a href="{{ route('donations.show', $donation->id) }}" class="btn btn-outline-info btn-sm">Ver</a>
											
											<td>
												<a href="{{ route('donations.edit', $donation->id) }}" class="btn btn-outline-success btn-sm">Alterar</a>
											</td>
											<td>
												{!! Form::open(['route' => ['donations.destroy', $donation->id] , 'method' => 'DELETE']) !!}
												<button class="btn btn-outline-danger btn-sm">Excluir</button>
												{!! Form::close() !!}
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>

								{{ $donations->render() }}
							</div>
						</div>
					</div>
				</div>
			</div>
			@endsection
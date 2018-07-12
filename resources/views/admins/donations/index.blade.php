@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">

				<div class="card-header">
					Doações
					<a href="{{ route('rewards.index') }}" class="btn btn-outline-info btn-sm float-right">Nova doação</a>
				</div>

				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</div>
					@endif

					<div class="table-responsive">
						<table class="table table-striped table-sm">
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
										<td class="float-right">
											<a href="{{ route('donations.show', $donation->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-eye"></i></a>
										</td>
										<td class="float-right">
											<a href="{{ route('donations.edit', $donation->id) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i></a>
										</td>
										<td class="float-right">
											{!! Form::open(['route' => ['donations.destroy', $donation->id] , 'method' => 'DELETE']) !!}
											<button class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
											{!! Form::close() !!}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					{{ $donations->render() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
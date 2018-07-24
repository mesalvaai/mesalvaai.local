@extends('layouts.site.appfc')

@section('content')
	<div class="container pt-4 pb-4">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-8">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">{{ $reward->title }}</h5>
					</div>
				  	<div class="card-body">
				    	<p class="card-text">{{ $reward->description }}</p>
				    	{{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
				  	</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4">
				<a href="{{ route('edit.reward', $reward->id) }}" title="Alterar" class="btn btn-outline-success w-100 mb-3"><i class="fas fa-edit"></i> Altera Recompensa</a>
				<ul class="list-group pb-3">
				  	<li class="list-group-item msa-bg text-white">Detalhes</li>
				  	<li class="list-group-item"><strong>Valor a ser doado: </strong>$R {{ $reward->donation }}</li>
				  	<li class="list-group-item"><strong>Recompensas limitadas? : </strong>{{ ($reward->unlimited == 'sim') ? 'Sim' : 'Não' }}</li>
				  	<li class="list-group-item"><strong>Quantidade de recompensas: </strong>{{ $reward->quantity }}</li>
				  	<li class="list-group-item"><strong>Data da entrega: </strong>{{ $reward->delivery_date }}</li>
				  	<li class="list-group-item"><strong>Modo de entrega: </strong>{{ $reward->delivery_mode }}</li>
				  	<li class="list-group-item"><strong>Existe variação: </strong>{{ ($reward->variations == 0) ? 'Não' : 'Sim' }}</li>
				  	<li class="list-group-item"><strong>Agradecimento: </strong>{{ $reward->thanks }}</li>
				  	<li class="list-group-item"><strong>Situação: </strong> {{ ($reward->status == 0) ? 'Inativo' : 'Ativo' }}</li>
				</ul>
			</div>
		</div>
	</div>
@endsection
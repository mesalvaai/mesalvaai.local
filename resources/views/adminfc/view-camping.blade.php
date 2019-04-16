@extends('layouts.site.appfc')

@section('content')
	<div class="container pt-4 pb-4">
		@if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
        @endif
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-8">
				<div class="card">
				  	<div class="card-body">
				  		<a class="float-right" href="{{ route('edit.camping', $camping->id) }}" title="Alterar campanha"><span class="badge badge-warning">Alterar</span></a>
				    	<h5 class="card-title">{{ $camping->title }}</h5>
				    	<p class="card-text">{{ $camping->abstract }}</p>
				    	{{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}


				  	</div>
				  	{{-- @if (Storage::disk('images')->has($camping->file_path))
	                    <img class="card-img-bottom" alt="{{ $camping->title }}" src="{{ url('/miniatura/'. $camping->file_path) }}">
	                @endif --}}
	                <div class="card-body">
				    	<p class="card-title text-justify">{!! $camping->description !!}</p>
				  	</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4">
				<a href="{{ route('edit.camping', $camping->id) }}" title="Publicar campanha" class="btn btn-outline-success w-100 mb-3"><i class="fas fa-edit"></i> Alterar campanha</a>
				<div class="card">
					<div class="card-header">
						<h2 class="text-info text-center">OBJETIVO</h2>
					</div>
					<div class="card-body">
						<h2 class="text-success text-center font-weight-bold">{{ ($camping->funds_received == '') ? 'R$0,00' :  'R$ ' .number_format($camping->funds_received,2,',','.') }}</h2>
						<div class="progress bg-danger">
                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: {!! \ProgressBar::progressDonation($camping->funds_received, $camping->goal) !!}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{!! \ProgressBar::progressDonation($camping->funds_received, $camping->goal) !!}
                            </div>
                        </div>
                        <p class="text-center pt-3">Arrecadados da meta de <br> $R {{ number_format($camping->goal,2,',','.') }} </p>
                        
                        @if ($camping->published !== 1)
							<hr>
                        	<h2 class="text-center">Rascunho</h2>
						@endif
					</div>
					<div class="card-footer text-center">
						@if ($camping->published == 1)
							<a href="#" title="Alterar" class="btn btn-outline-warning w-100">Sua campanha já foi lançada</a>
						@else
							<a href="{{ route('publish.camping', $camping->id) }}" title="Alterar" class="btn btn-outline-warning">Lançar Campanha!</a>
						@endif
						
					</div>
				</div>

				<div class="card mt-3">
					<div class="card-header bg-info pt-4">
						<h2 class="text-white text-center">RECOMPENSAS</h2>
					</div>
					<div class="card-body text-center">
						@foreach ($camping->rewards as $reward)
							<h3 class="text-success">$R {{ number_format($reward->donation,2,',','.') }}</h3>
							<p class="text-center"><strong>{{ $reward->title }}</strong> <br> 
								<em class="text-muted">{!! $reward->description !!}</em>
							</p>
							<small class="text-muted">Entrega estimada em {{ $reward->delivery_date }}</small>
							<hr>
						@endforeach

					</div>
					<div class="card-footer text-center">
						<a href="{{ route('create.rewards', $camping->id) }}" title="Alterar" class="btn btn-outline-warning"><i class="fas fa-plus"></i> Adicionar recompensa</a>
					</div>
				</div>
				{{-- <ul class="list-group pb-3">
				  	<li class="list-group-item msa-bg text-white">INICIO DA CAMPANHA</li>
				  	<li class="list-group-item">{{ $camping->start_date }}</li>
				</ul>

				<ul class="list-group pb-3">
				  	<li class="list-group-item bg-danger text-white">FIN DA CAMPANHA</li>
				  	<li class="list-group-item">{{ $camping->end_date }}</li>
				</ul>

				<ul class="list-group pb-3">
				  	<li class="list-group-item bg-success text-white">META</li>
				  	<li class="list-group-item">$R {{ $camping->goal }}</li>
				</ul>

				<ul class="list-group pb-3">
				  	<li class="list-group-item bg-success text-white">RECEVIDOS</li>
				  	<li class="list-group-item">$R {{ $camping->funds_received }}</li>
				</ul>

				<ul class="list-group pb-3">
				  	<li class="list-group-item msa-bg text-white">CATEGORIA</li>
				  	<li class="list-group-item">{{ $camping->category->name }}</li>
				</ul>

				<ul class="list-group pb-3">
				  	<li class="list-group-item active">DADOS DO ESTUDO</li>
				  	<li class="list-group-item">Institução: {{ $camping->institution }}</li>
				  	<li class="list-group-item">Curso: {{ $camping->course }}</li>
				  	<li class="list-group-item">Periodo: {{ $camping->period }}</li>
				</ul> --}}
			</div>
		</div>
	</div>
@endsection
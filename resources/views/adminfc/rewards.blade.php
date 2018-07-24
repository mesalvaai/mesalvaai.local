@extends('layouts.site.appfc')
 
@section('content')
{{-- <section id="painel-fc" class="painel-fc">
    <div class="painel-fc-bg">
        <div class="container text-center">
            <h1 class="text-white">TODA SUAS CAMPANHAS</h1>
        </div>
    </div>
</section> --}}
	
<div class="container pt-5 pb-5">
	@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </div>
    @endif
    <div class="row pb-3">
    	<div class="col-md">
    		<h2 class="text-msa">Campanhas</h2>
    	</div>
    	<div class="col-md">
    		<h2 class="text-msa">Recompensas</h2>
    	</div>
    </div>
	@foreach ($campings as $camping)
		<div class="row pb-3">
			<div class="col-md">
				<div class="media">
					<img class="mr-3 w-50" src="{{ url('/miniatura/'. $camping->file_path) }}" alt="{{ $camping->title }}">
					<div class="media-body">
						<h5 class="mt-0">{{ $camping->title }}</h5>
						<small class="figure-caption">{{ $camping->abstract }}</small> <hr>
						<a href="#" class="badge badge-info">Meta $R: {{ $camping->goal }}</a>
						<a href="#" class="badge badge-info">Arecaudado $R: {{ $camping->funds_received }}</a>
						<a href="{{ route('show.camping', $camping->id ) }}" class="badge badge-success">Mais Info>></a>
					</div>
				</div>
			</div>
			<div class="col-md">
				<div class="card">
					<ul class="list-group list-group-flush">
						@foreach ($camping->rewards as $reward)
						    <li class="list-group-item">
						    	{{ $reward->title }}
								<a class="float-right badge badge-warning" href="{{ route('edit.reward', $reward->id) }}" title="Nova Recompensa"><i class="fas fa-edit"></i> Alterar</a>
								<a class="float-right badge badge-success mr-1" href="{{ route('show.reward', $reward->id) }}" title="Nova Recompensa"><i class="fas fa-eye"></i> Ver</a>
						    </li>
						@endforeach
						<li class="list-group-item">
							<a class="float-right btn btn-outline-success btn-sm" href="{{ route('create.rewards', $camping->id) }}" title="Nova Recompensa"><i class="fas fa-plus"></i> Nova Recompensa</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	@endforeach
	{{-- <div class="card" style="max-width: 319px;">
	    @if (Storage::disk('images')->has($camping->file))
            <img class="card-img-top" data-src="holder.js/100px160/" alt="{{ $camping->title }}" src="{{ url('/miniatura/'. $camping->file) }}" data-holder-rendered="true">
        @endif
	    <div class="card-body">
	      	<h5 class="card-title">{{ $camping->title }}</h5>
	      	<p class="card-text">{{ $camping->abstract }}</p>
	      	<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
	      	@foreach ($camping->rewards as $reward)
	      		{{ $reward->title }}
	      	@endforeach
	    </div>
	    <div class="card-footer">
	    	<a class="btn btn-outline-info btn-sm w-100 mb-2" href="{{ route('create.rewards', $camping->id ) }}" title="Criar recompensa">Criar Recompensas</a>
	    	<a class="btn btn-outline-info btn-sm w-100" href="{{ route('create.rewards', $camping->id ) }}" title="Criar recompensa">Ver Campanha</a>
	    </div>
	</div> --}}
</div>

@endsection
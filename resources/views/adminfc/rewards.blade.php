@extends('layouts.site.appfc')
 
@section('content')
	
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
						<a href="#" class="badge badge-info">Meta R$: {{ $camping->goal }}</a>
						<a href="#" class="badge badge-info">Arrecadado R$: {{ $camping->funds_received }}</a>
						<a href="{{ route('show.camping', $camping->id ) }}" class="badge badge-success">Visualizar >></a>
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
</div>

@endsection
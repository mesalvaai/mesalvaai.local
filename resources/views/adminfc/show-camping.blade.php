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
					  <div class="card-footer">
					  <span>{{url('/campanhas/'.$camping->slug)}}</span>
					  </div>

				</div>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4">
				<a href="{{ route('edit.camping', $camping->id) }}" title="Alterar" class="btn btn-outline-success w-100 mb-3"><i class="fas fa-edit"></i> Alterar campanha</a>

				<div class="card">
					<div class="card-body">
						<h6 class="card-title font-weight-bold">Inicio da campanha</h6>
						<h6 class="card-subtitle mb-2 text-muted">{{ date('d/m/Y', strtotime($camping->start_date)) }}</h6>
						<div class="dropdown-divider"></div>
						<h6 class="card-title font-weight-bold">Fin da campanha</h6>
						<h6 class="card-subtitle mb-2 text-muted">{{ date('d/m/Y', strtotime($camping->end_date)) }}</h6>
						<div class="dropdown-divider"></div>
						<h6 class="card-title font-weight-bold">Meta</h6>
						<h6 class="card-subtitle mb-2 text-muted">R$ {{ number_format($camping->goal, 2) }}</h6>
						<div class="dropdown-divider"></div>
						<h6 class="card-title font-weight-bold">Recebidos</h6>
						<h6 class="card-subtitle mb-2 text-muted">R$ {{ number_format($camping->funds_received, 2) }}</h6>
						<div class="dropdown-divider"></div>
						<h6 class="card-title font-weight-bold">Categoria</h6>
						<h6 class="card-subtitle mb-2 text-muted">{{ $camping->category->name }}</h6>
					</div>
				</div>

				<ul class="list-group pt-2 pb-3">
				  	<li class="list-group-item active">DADOS DO ESTUDO</li>
				  	<li class="list-group-item">Institução: {{ $camping->institution }}</li>
				  	<li class="list-group-item">Curso: {{ $camping->course }}</li>
				  	<li class="list-group-item">Periodo: {{ $camping->period }}</li>
				</ul>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection
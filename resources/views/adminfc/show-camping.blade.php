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
				<ul class="list-group pb-3">
				  	<li class="list-group-item msa-bg text-white">INICIO DA CAMPANHA</li>
				  	<li class="list-group-item">{{ date('d/m/Y', strtotime($camping->start_date)) }}</li>
				</ul>

				<ul class="list-group pb-3">
				  	<li class="list-group-item bg-danger text-white">FIM DA CAMPANHA</li>
				  	<li class="list-group-item">{{ date('d/m/Y', strtotime($camping->end_date)) }}</li>
				</ul>

				<ul class="list-group pb-3">
				  	<li class="list-group-item bg-success text-white">META</li>
				  	<li class="list-group-item">R$ {{ number_format($camping->goal, 2) }}</li>
				</ul>

				<ul class="list-group pb-3">
				  	<li class="list-group-item bg-success text-white">RECEBIDOS</li>
				  	<li class="list-group-item">R$ {{ number_format($camping->funds_received, 2) }}</li>
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
				</ul>
			</div>
		</div>
	</div>
@endsection
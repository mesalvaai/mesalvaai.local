@extends('layouts.site.app', ['title' => 'ME SALVA AI'])


@section('content')
	<section class="campaing-for-student">
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
								<h5 class="card-title">{{ $campanha->title }}</h5>
								<p class="card-text">{{ $campanha->abstract }}</p>
								{{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
							</div>
				  	{{-- @if (Storage::disk('images')->has($campanha->file_path))
	                    <img class="card-img-bottom" alt="{{ $campanha->title }}" src="{{ url('/miniatura/'. $campanha->file_path) }}">
	                    @endif --}}
	                    <div class="card-body">
	                    	<p class="card-title text-justify">{!! $campanha->description !!}</p>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xs-12 col-sm-4 col-md-4">
	            	<div class="card">
	            		<div class="card-header">
	            			<h2 class="text-info text-center">OBJETIVO</h2>
	            		</div>
	            		<div class="card-body">
	            			<h2 class="text-success text-center font-weight-bold">{{ ($campanha->funds_received == '') ? 'R$0,00' :  'R$ ' .number_format($campanha->funds_received,2,',','.') }}</h2>
	            			<div class="progress bg-danger">
	            				<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: {!! \ProgressBar::progressDonation($campanha->funds_received, $campanha->goal) !!}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{!! \ProgressBar::progressDonation($campanha->funds_received, $campanha->goal) !!}
	            				</div>
	            			</div>
	            			<p class="text-center pt-3">Arrecadados da meta de <br> $R {{ number_format($campanha->goal,2,',','.') }} </p>
	            		</div>
	            		<div class="card-footer text-center">
	            			<a href="#" title="Alterar" class="btn btn-success w-100">Quero doar!</a>
	            		</div>
	            	</div>

	            	<div class="card mt-3">
	            		<div class="card-header bg-info pt-4">
	            			<h2 class="text-white text-center">RECOMPENSAS</h2>
	            		</div>
	            		<div class="card-body text-center">
	            			@foreach ($campanha->rewards as $reward)
	            			<h3 class="text-success">$R {{ number_format($reward->donation,2,',','.') }}</h3>
	            			<p class="text-center"><strong>{{ $reward->title }}</strong> <br> 
	            				<em class="text-muted">{!! $reward->description !!}</em>
	            			</p>
	            			<small class="text-muted">Entrega estimada em {{ $reward->delivery_date }}</small>
	            			<hr>
	            			@endforeach

	            		</div>{{-- 
	            		<div class="card-footer text-center">
	            			<a href="{{ route('create.rewards', $campanha->id) }}" title="Alterar" class="btn btn-outline-warning"><i class="fas fa-plus"></i> Adicionar recompensa</a>
	            		</div> --}}
	            	</div>
	            </div>
	        </div>
	    </div>
	</section>
@endsection


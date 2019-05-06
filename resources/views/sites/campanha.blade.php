
@extends('layouts.site.app', 
[
	'title' => $campanha->title.' - ME SALVA AI',
	'image' => url("/miniatura/". $campanha->file_path)
])

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
							</div>
	                    <div class="card-body">
	                    	<p class="card-title text-justify">{!! $campanha->description !!}</p>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xs-12 col-sm-4 col-md-4">
	            	<div class="card">
	            		<div class="card-header pt-4 pb-1">
	            			<h3 class="text-dark text-center font-weight-bold">OBJETIVO</h3>
	            		</div>
	            		<div class="card-body">
	            			<h4 class="text-success text-center">{{ ($campanha->funds_received == '') ? 'R$ 0,00' :  'R$ ' .number_format($campanha->funds_received,2,',','.') }}</h4>
	            			<div class="progress bg-warning">
	            				<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: {!! ProgressBar::progressDonation($campanha->funds_received, $campanha->goal) !!}%" aria-valuenow="{!! ProgressBar::progressDonation($campanha->funds_received, $campanha->goal) !!}" aria-valuemin="0" aria-valuemax="100">{!! ProgressBar::progressDonation($campanha->funds_received, $campanha->goal) !!}%
	            				</div>
	            			</div>
	            			<p class="text-center pt-3">arrecadados da meta de <br> R$ {{ number_format($campanha->goal,2,',','.') }} </p>
	            		</div>
	            		<div class="card-footer text-center">
	            			<a href="{{ route('donate.campanha', $campanha->slug) }}" title="Donar" class="btn btn-info w-100">Quero doar!</a>
	            		</div>
	            	</div>

	            	<div class="card mt-3">
	            		<div class="card-header bg-dark pt-3 pb-0 mb-0">
	            			<h5 class="text-white text-center">RECOMPENSAS</h5>
	            		</div>
	            		<div class="card-body text-center">
	            			@foreach ($campanha->rewards as $reward)
	            			<h3 class="text-success">R$ {{ number_format($reward->donation,2,',','.') }}</h3>
	            			<p class="text-center"><strong>{{ $reward->title }}</strong> <br> 
	            				<em class="text-muted">{!! $reward->description !!}</em>
	            			</p>
	            			<small class="text-muted">Entrega estimada em {{ FormatTime::formatDataBrasil($reward->delivery_date) }}</small>
	            			<hr>
	            			@endforeach

	            		</div>
	            	</div>
	            </div>
	        </div>
	    </div>
	</section>
@endsection

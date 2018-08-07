
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
							{{ Form::open(['route' => 'donate.process', 'novalidate']) }}
		                            @include('sites.donations.partials.form-donate')
		                    {{ Form::close() }}
						</div>
	                </div>
	            </div>
	            <div class="col-xs-12 col-sm-4 col-md-4">
	            	<div class="card">
	            		<div class="card-header">
	            			<b class="text-muted">{{ $campanha->abstract }}</b>
	            		</div>
	            		<div class="card-body">
	            			@if (Storage::disk('images')->has($campanha->file_path))
		                    <img class="card-img-bottom" alt="{{ $campanha->title }}" src="{{ url('/miniatura/'. $campanha->file_path) }}">
		                    @endif 
	            			<h5 class="text-success text-center font-weight-bold pt-3">{{ ($campanha->funds_received == '') ? 'R$0,00' :  'R$ ' .number_format($campanha->funds_received,2,',','.') }} 
		            			<b class="text-dark">de</b> <small class="text-muted">$R {{ number_format($campanha->goal,2,',','.') }}</small>
		            		</h5> 

	            			<div class="progress bg-danger">
	            				<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: {!! \ProgressBar::progressDonation($campanha->funds_received, $campanha->goal) !!}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{!! \ProgressBar::progressDonation($campanha->funds_received, $campanha->goal) !!}
	            				</div>
	            			</div>
	            		</div>
	            		<div class="card-footer text-center">
	            			<h2 class="text-msa font-weight-bold">ME SALVA AI</h2>
	            		</div>
	            	</div>
	            </div>
	        </div>
	    </div>
	</section>
@endsection



@extends('layouts.site.appfc')
 
@section('content')
	
<div class="container pt-5 pb-5">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 colxl-12">
			@if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </div>
            @endif
			<div class="card-columns">
				@foreach ($campings as $camping)
					<div class="card" style="max-width: 319px;">
					    @if (Storage::disk('images')->has($camping->file_path))
		                    <img class="card-img-top" data-src="holder.js/100px160/" alt="{{ $camping->title }}" src="{{ url('/miniatura/'. $camping->file_path) }}" data-holder-rendered="true">
		                @endif
					    <div class="card-body">
					      	<h5 class="card-title">{{ $camping->title }}</h5>
					      	<p class="card-text">{{ $camping->abstract }}</p>
					      	<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
					    </div>
					    <div class="card-footer">
					    	<a class="btn btn-success btn-sm w-100 mb-2" href="{{ route('create.rewards', $camping->id ) }}" title="Criar recompensa">Criar Recompensas</a>
					    	<a class="btn btn-outline-info btn-sm" href="{{ route('show.camping', $camping->id ) }}" title="Criar recompensa"><i class="fas fa-edit"></i> Ver</a>
					    	<a class="btn btn-outline-danger btn-sm float-right" href="{{ route('edit.camping', $camping->id ) }}" title="Criar recompensa"><i class="fas fa-edit"></i> Alterar</a>
					    </div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>

@endsection
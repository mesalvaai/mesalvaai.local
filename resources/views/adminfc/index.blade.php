@extends('layouts.site.appfc')
 
@section('content')
<section id="painel-fc" class="painel-fc">
    <div class="painel-fc-bg">
        <div class="container text-center">
            <h1 class="text-white">TODA SUAS CAMPANHAS</h1>
        </div>
    </div>
</section>
	
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
					    @if (Storage::disk('images')->has($camping->file))
		                    <img class="card-img-top" data-src="holder.js/100px160/" alt="{{ $camping->title }}" src="{{ url('/miniatura/'. $camping->file) }}" data-holder-rendered="true">
		                @endif
					    <div class="card-body">
					      	<h5 class="card-title">{{ $camping->title }}</h5>
					      	<p class="card-text">{{ $camping->abstract }}</p>
					      	<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
					    </div>
					    <div class="card-footer">
					    	<a class="btn btn-outline-info btn-sm w-100 mb-2" href="{{ route('create.rewards', $camping->id ) }}" title="Criar recompensa">Criar Recompensas</a>
					    	<a class="btn btn-outline-info btn-sm w-100" href="{{ route('create.rewards', $camping->id ) }}" title="Criar recompensa">Ver Campanha</a>
					    </div>
					</div>
				@endforeach
				
				{{-- <div class="card" style="max-width: 319px;">
				    <img class="card-img-top" src=".../100px160/" alt="Card image cap">
				    <div class="card-body">
				      	<h5 class="card-title">Card title</h5>
				      	<p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
				      	<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
				    </div>
				</div>
				<div class="card" style="max-width: 319px;">
				    <img class="card-img-top" src=".../100px160/" alt="Card image cap">
				    <div class="card-body">
				      	<h5 class="card-title">Card title</h5>
				      	<p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
				      	<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
				    </div>
				</div>
				<div class="card" style="max-width: 319px;">
				    <img class="card-img-top" src=".../100px160/" alt="Card image cap">
				    <div class="card-body">
				      	<h5 class="card-title">Card title</h5>
				      	<p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
				      	<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
				    </div>
				</div>
				<div class="card" style="max-width: 319px;">
				    <img class="card-img-top" src=".../100px160/" alt="Card image cap">
				    <div class="card-body">
				      	<h5 class="card-title">Card title</h5>
				      	<p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
				      	<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
				    </div>
				</div> --}}
			</div>
		</div>
	</div>
</div>

{{-- <div class="container">
    <div class="card-columns">
        <div class="card">
            <img class="card-img-top img-fluid" src="//placehold.it/800x560" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">Card title that wraps to a new line</h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top img-fluid" src="//placehold.it/800x560" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">Card title that wraps to a new line</h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top img-fluid" src="//placehold.it/800x560" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">Card title that wraps to a new line</h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>

        <div class="card card-body">
            <blockquote class="card-blockquote">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <footer>
                    <small class="text-muted">
          Someone famous in <cite title="Source Title">Source Title</cite>
        </small>
                </footer>
            </blockquote>
        </div>
        <div class="card">
            <img class="card-img-top img-fluid" src="//placehold.it/800x400" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card card-body card-inverse card-primary text-xs-center">
            <blockquote class="card-blockquote">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                <footer>
                    <small>
          Someone famous in <cite title="Source Title">Source Title</cite>
        </small>
                </footer>
            </blockquote>
        </div>
        <div class="card card-body text-xs-center">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
        <div class="card">
            <img class="card-img img-fluid" src="//placehold.it/800x600" alt="Card image">
        </div>
        <div class="card card-body text-right">
            <blockquote class="card-blockquote">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <footer>
                    <small class="text-muted">
                      Someone famous in <cite title="Source Title">Source Title</cite>
                    </small>
                </footer>
            </blockquote>
        </div>
        <div class="card card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>
</div> --}}
@endsection
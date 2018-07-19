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
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 col-xl-8">
			<div class="card">
				<div class="card-header">
					<div class="media">
					  	<img class="mr-3" src=".../64x64" alt="Generic placeholder image">
					  	<div class="media-body">
					  		<a class="btn btn-outline-info btn-sm float-right" href="{{ route('edit.student', $students->id) }}" title="Edit"><i class="fas fa-edit"></i> Alterar</a>
					    	<h5 class="mt-0"><strong>{{ $students->name }}</strong></h5>
					    	<em class="text-muted"><strong>E-mail: </strong>{{ $students->email }}</em><br>
					    	<em class="text-muted"><strong>Telefone: </strong>{{ $students->phone }}</em>
					    	<p><strong>CPF: </strong>{{ $students->cpf }}</p>
					  	</div>
					</div>
				</div>
				<div class="card-body">
					<strong>Data de Nacimento: </strong>{{ $students->data_of_birth }}
					<strong>Como chegou aqui: </strong>{{ $students->how_met_us }}
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
			<div class="card">
				<div class="card-header">
					UBICAÇÃO
				</div>
				<div class="card-body">
					<strong>CEP: </strong>{{ $students->cep }} <br>
					<strong>Estado: </strong>{{ $students->state_id }} <br>
					<strong>Cidade: </strong>{{ $students->city_id }} <br>
					<strong>Rua: </strong>{{ $students->street }} <br>
					<strong>Numero: </strong>{{ $students->number }} <br>
					<strong>Barrio: </strong>{{ $students->neighborhood }} <br>
					<strong>Complemento: </strong>{{ $students->complement }} <br>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
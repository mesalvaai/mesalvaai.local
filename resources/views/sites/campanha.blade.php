@extends('layouts.site.app', ['title' => 'ME SALVA AI'])


@section('content')
	<div class="container pt-5">
		<br><br><br><br>
		<h3>{{ $slug }}</h3>
		Titulo: {{ $campanha->title }}
	</div>
@endsection


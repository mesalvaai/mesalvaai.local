@extends('layouts.site.app', ['title' => 'ME SALVA AI'])

@section('header')
	@include('layouts.site.partials.menu', ['some' => 'data'])
@endsection

@section('content')
	@include('sites.cursos.index')
@endsection

@section('footer')
	@include('layouts.site.partials.footer', ['some' => 'data'])
@endsection
@extends('layouts/master', ['title' => 'ME SALVA AI'])

@section('header')
	@include('layouts.header', ['some' => 'data'])
@endsection

@section('content')
	@include('sites.cursos.faculdade')
@endsection

@section('footer')
	@include('layouts.footer', ['some' => 'data'])
@endsection
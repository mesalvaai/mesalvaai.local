@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Curso - </strong>
                    <strong>{{$course->name}}</strong>
                    <a href="{{ route('courses.index') }}" class="btn btn-outline-info btn-sm float-right">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p><strong> Nome: </strong>{{ $course->name }}</p>
                    <p><strong> Slug: </strong>{{ $course->slug }}</p>
                    <p><strong> Duração:</strong>{{ $course->duration }}</p>
                    <p><strong> evalution: </strong>{{ $course->evaluation }}</p>
                    <p><strong> Abstração:  </strong>{{ $course->abstract }}</p>
                    <p><strong> Conteúdo: </strong>{{ $course->content }}</p>
                    <p><strong> Benefíceis: </strong>{{ $course->benefits }}</p>
                    <p><strong> Status: </strong>{{ $course->status }}</p>
                    <p><strong> Area: </strong>{{ $course->area->name }}</p>
                    <p><strong> Nível: </strong>{{ $course->level->name }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

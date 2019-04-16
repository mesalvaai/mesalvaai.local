@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Costs</strong>
                    <a href="{{ route('costs.create') }}" class="btn btn-outline-info btn-sm float-right">Novo Costs</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Pagamento Mensal</th>
                                    <th>Desconto</th>
                                    <th>Bolsa de Estudos</th>
                                    <th>Economia</th>
                                    <th>Vaga</th>
                                    <th>Status</th>
                                    <th>Curso</th>
                                    <th>Período</th>
                                    <th>Nível</th>
                                    
                                    <th colspan="3">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($costs as $cost)
                                    <tr>
                                        <td>{{ $cost->id }}</td>
                                        <td>{{ $cost->monthly_payment }}</td>
                                        <td>{{ $cost->discount }}</td>
                                        <td>{{ $cost->scholarship }}</td>
                                        <td>{{ $cost->economy }}</td>
                                        <td>{{ $cost->vacancy }}</td>
                                        <td>{{ $cost->status }}</td>
                                        <td>{{ $cost->course_id }}</td>
                                        <td>{{ $cost->periods_id }}</td>
                                        <td>{{ $cost->level_id }}</td>
                                        
                                        <td class="float-right">
                                            <a href="{{ route('costs.show', $costs->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-eye"></i></a>
                                        </td>
                                        <td class="float-right">
                                                <a href="{{ route('costs.edit', $costs->id) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td class="float-right">
                                                {!! Form::open(['route' => ['costs.destroy', $costs->id] , 'method' => 'DELETE']) !!}
                                                <button class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                {!! Form::close() !!}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>    
                    </div>                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

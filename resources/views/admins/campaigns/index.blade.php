@extends('layouts.painel.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Campanhas</strong>
                    <a href="{{ route('campaigns.create') }}" class="btn btn-outline-info btn-sm float-right">Nova campanha</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Titulo</th>
                                    <th>Objetivo</th>
                                    <th>Fundos recebidos</th>
                                    <th>Data de início</th>
                                    <th>Data Final</th>
                                    <th scope="col" colspan="3" class="text-center">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($campaigns as $campaign)
                                    <tr>
                                        <td>{{ $campaign->id }}</td>
                                        <td>{{ $campaign->title }}</td>
                                        <td>{{ $campaign->goal }}</td>
                                        <td>{{ ($campaign->funds_received == null) ? '0' : $campaign->funds_received }}</td> 
                                        <td>{{ $campaign->start_date }}</td> 
                                        <td>{{ $campaign->end_date }}</td> 
                                        <td class="float-right">
                                            <a href="{{ route('campaigns.show', $campaign->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-eye"></i></a>
                                        </td>
                                        <td class="float-right">
                                            <a href="{{ route('campaigns.edit', $campaign->id) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td class="float-right">
                                            {!! Form::open(['route' => ['campaigns.destroy', $campaign->id] , 'method' => 'DELETE']) !!}
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

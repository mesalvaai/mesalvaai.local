@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                            <span aria-hidden="true">&times;</span>
                        </div>
                        @endif
                        <table class="table table-striped table-bordered table-sm">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                     <th>Id</th>
                                     <th>Objetivo</th>
                                     <th>Fundos recebidos</th>
                                     <th>Data de início</th>
                                     <th>Descrição da campanha</th>
                                     <th>Localização</th>
                                     <th colspan="3">Opções</th>
                                 </tr>
                             </thead>
                             <tbody>
                                @foreach ($campaigns as $campaign)
                                <tr>
                                    <td>{{ $campaign->id }}</td>
                                    <td>{{ $campaign->goal }}</td>
                                    <td>{{ $campaign->funds_received }}</td> 
                                    <td>{{ $campaign->start_date }}</td> 
                                    <td>{{ $campaign->description }}</td> 
                                    <td>{{ $campaign->location }}</td> 
                                    <td>
                                        <a href="{{ route('campaigns.show', $campaign->id) }}" class="btn btn-outline-info btn-sm">Ver</a>
                                        
                                        <td>
                                            <a href="{{ route('campaigns.edit', $campaign->id) }}" class="btn btn-outline-success btn-sm">Alterar</a>
                                        </td>
                                        <td>
                                            {!! Form::open(['route' => ['campaigns.destroy', $campaign->id] , 'method' => 'DELETE']) !!}
                                            <button class="btn btn-outline-danger btn-sm">Excluir</button>
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
        @endsection

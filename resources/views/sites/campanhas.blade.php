 @extends('layouts.site.app', ['title' => 'ME SALVA AI'])

 @section('content')

 <section class="campanhas-ativas pt-5 pb-5" style="margin-top: 80px">
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
        @endif
        <div class="row">
            @foreach ($campanhas as $campanha)
            <div class="col-md-3">
                <div class="card mb-3">
                    <a href="#" style="background-image: url({{ url('/miniatura/'. $campanha->file_path)  }});" class="img-min-campaign"></a>
                    <div class="card-body">
                        <div style="height: 50px;">
                            <a href="{{ route('show.campanha', $campanha->slug) }}"><h5 class="card-title">{{ str_limit($campanha->title,'50') }}</h5></a>
                        </div>
                        <div style="height: 80px;">
                            <p class="card-text">{{ str_limit($campanha->abstract, '80') }}</p>

                        </div>
                        <div class="row">
                            <div class="col">
                                <span class="badge badge-pill badge-secondary mb-2 float-left">R$ {{ $campanha->funds_received }}</span>
                                <span class="badge badge-pill badge-info mb-2 float-right">R$ {{ $campanha->goal }}</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{ ProgressBar::progressDonation($campanha->funds_received, $campanha->goal) }}%" aria-valuenow="{{ ProgressBar::progressDonation($campanha->funds_received, $campanha->goal) }}" aria-valuemin="0" aria-valuemax="100">{{ \ProgressBar::progressDonation($campanha->funds_received, $campanha->goal) }}%</div>
                        </div>
                        {{-- <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ \ProgressBar::progressDonation($campanha->funds_received, $campanha->goal) }}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ \ProgressBar::progressDonation($campanha->funds_received, $campanha->goal) }}</div>
                        </div> --}}
                        <p class="card-text pt-2">
                            <small class="text-muted float-left">{{ FormatTime::diasRestantes($campanha->end_date) }}</small>
                        </p>
                        <div style="margin: 20px; margin-top: 50px;" width="100%" align="center">
                            <a href="{{ route('show.campanha', $campanha->slug) }}" title="Doar"  class="get-started-btn">Doar</a>
                        </div>
                    </div> 
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
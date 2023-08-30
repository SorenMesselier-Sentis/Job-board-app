@extends('layout')

@section('content')
    <div class="container">
        <h1>Offres d'emplois</h1>
        <select name="contractType" id="contractType">
            <option>-Contrat-</option>
            @foreach ($contractTypes as $contractType)
                <option value="{{ $contractType }}">
                    {{ $contractType }}
                </option>
            @endforeach
        </select>
        <select name="jobType" id="jobType">
            <option>-Type de travail-</option>
            @foreach ($jobTypes as $jobType)
                <option value="{{ $jobType }}">
                    {{ $jobType }}
                </option>
            @endforeach
        </select>
        @foreach ($offers as $offer)
            <div class="offers card mb-3" data-contract="{{ $contractType }}">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <img src="{{ $offer->image }}" class="card-img" alt="random meme">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <p class="card-text">
                                <small class="text-muted">
                                    {{ $offer->published_at }}
                                </small>
                            </p>
                            <h5 class="card-title">{{ $offer->label }}</h5>
                            <p class="card-text">{{ $offer->company_label }}</p>
                            <p class="card-text">
                                {{ $offer->job_type }} /
                                {{ $offer->contract_type }} /
                                {{ $offer->company_location }}
                            </p>
                            <p class="card-text">
                                {{ substr($offer->description, 0, 30) }}
                                {{ strlen($offer->description) > 30 ? '...' : '' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div>
            <p>{{ $offers->links() }}</p>
        </div>
    </div>
@endsection

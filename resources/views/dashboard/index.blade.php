@extends('layout')

@section('content')
    <div class="container">
        <h1>Offres d'emplois</h1>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <label for="contractType" class="form-label">Type de contrat</label>
                    <select class="form-select" name="contractType" id="contractType">
                        <option value="">- Contrat -</option>
                        @foreach ($dataOffer["contractTypes"] as $contractType)
                            <option value="{{ $contractType }}">{{ $contractType }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="jobType" class="form-label">Type de travail</label>
                    <select class="form-select" name="jobType" id="jobType">
                        <option value="">- Type de travail -</option>
                        @foreach ($dataOffer["jobTypes"] as $jobType)
                            <option value="{{ $jobType }}">{{ $jobType }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <form method="POST" class="d-flex align-items-center">
                        @csrf
                        <div class="form-check form-switch me-3">
                            <input class="form-check-input" name="orderAsc" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ $dateAsc ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Le plus récent</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Ordonner par date</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            @foreach ($dataOffer["offers"] as $offer)
                <div class="card mb-3 offers" data-contract="{{ $offer->contract_type }}" data-job="{{ $offer->job_type }}">
                    <div class="row no-gutters">
                        <div class="col-md-3">
                            <img src="{{ $offer->image }}" class="img-fluid" alt="Image aléatoire">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <p class="card-text">
                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($offer->published_at)->locale('fr_FR')->isoFormat('dddd D MMMM YYYY') }}
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
        </div>

        <div class="pagination justify-content-center">
            {{ $dataOffer["offers"]->links() }}
        </div>
    </div>
@endsection

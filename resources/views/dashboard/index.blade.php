@extends('layout')

@section('content')
    <div class="container">
        <h1>Offres d'emplois</h1>
        @foreach ($offers as $offer)
            <div class="card mb-3">
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

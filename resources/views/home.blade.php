@extends('layouts.app')

@section('title', 'Αρχική')

@section('content')
    <div class="bg-light py-5">
        <!-- Ημερήσια Σύνοψη Τιμών  -->
        <div class="container text-center text-md-start">
            <div class="row mb-3">
                <div class="col">
                    <h1>Ημερήσια Σύνοψη Τιμών</h1>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <h3>{{ \Carbon\Carbon::now()->format('d/m/y') }}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <ul class="list-group">
                        @foreach($fuelStats as $item)
                            <x-home-fuel-stats name="{{$item->fuel_name}}" max="{{$item->max_amount}}"
                                               min="{{$item->min_amount}}" average="{{$item->avg_amount}}"/>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- Τελευταίες ανακοινώσεις  -->
        <div class="container mt-5 text-center text-md-start">
            <div class="row mb-3">
                <div class="col">
                    <h1>Τελευταίες ανακοινώσεις</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <ul class="list-group">
                        @foreach($announcements as $announcement)
                            <x-home-anouncement-item date="{{$announcement->created_at}}"
                                                     elementId="{{$announcement->id}}"
                                                     title="{{$announcement->title}}"/>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Humidity</h1>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">City: {{ $city }}</h4>
                <h2 class="card-title">Humidity: {{ $humidity }}%</h2>
            </div>
        </div>
    </div>
@endsection

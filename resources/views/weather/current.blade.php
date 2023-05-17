@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Current Weather</h1>

        <div class="card">
            <div class="card-body">
                <h2 class="card-title">City: {{ $weatherData['name'] }}</h2>
                <p class="card-text">Temperature: {{ $temperatureCelsius }}°C</p>
                <p class="card-text">Humidity: {{ $weatherData['main']['humidity'] }}%</p>
                <p class="card-text">Description: {{ $weatherData['weather'][0]['description'] }}</p>
            </div>
        </div>
    </div>
@endsection

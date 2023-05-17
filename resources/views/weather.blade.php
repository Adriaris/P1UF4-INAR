@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>Weather API</h1>

        <h2>Current Weather</h2>
        <form action="{{ route('weather.current') }}" method="GET" class="mb-3">
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" id="city" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Get Current Weather</button>
        </form>

        <h2>Weather Forecast</h2>
        <form action="{{ route('weather.forecast') }}" method="GET" class="mb-3">
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" id="city" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Get Weather Forecast</button>
        </form>

        <h2>Temperature</h2>
        <form action="{{ route('weather.temperature') }}" method="GET" class="mb-3">
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" id="city" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Get Temperature</button>
        </form>

        <h2>Humidity</h2>
        <form action="{{ route('weather.humidity') }}" method="GET" class="mb-3">
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" id="city" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Get Humidity</button>
        </form>
    </div>
@endsection

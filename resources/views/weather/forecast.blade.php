@extends('layout')

@section('content')
    <div class="container">
        <h1>Weather Forecast</h1>

        <h2>City: {{ $forecastData['city']['name'] }}</h2>

        @php
            $currentDate = '';
            $count = 0;
        @endphp

        <div class="row">
            @foreach ($forecastData['list'] as $forecast)
                @php
                    $date = date('Y-m-d', strtotime($forecast['dt_txt']));
                @endphp

                @if ($date != $currentDate)
                    @php
                        $currentDate = $date;
                        $count = 0;
                    @endphp

                    <div class="w-100"></div> <!-- Nueva fila -->
                    <div class="col-12">
                        <h3>{{ $date }}</h3>
                        <hr>
                    </div>
                @endif

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Date: {{ $forecast['dt_txt'] }}</h5>
                            <p class="card-text">Temperature: {{ $forecast['main']['temp'] }}°C</p>
                            <p class="card-text">Humidity: {{ $forecast['main']['humidity'] }}%</p>
                            <p class="card-text">Description: {{ $forecast['weather'][0]['description'] }}</p>
                        </div>
                    </div>
                </div>

                @php
                    $count++;
                @endphp
            @endforeach
        </div>
    </div>
@endsection

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    protected $apiKey;
    protected $httpClient;
    protected $apiUrl = 'https://api.openweathermap.org/data/2.5/';

    public function __construct()
    {
        $this->apiKey = env('API_KEY');
        $this->httpClient = new Client([
            'base_uri' => $this->apiUrl,
        ]);
    }
    //http://127.0.0.1:8000/api/weather/current?city=Barcelona
    public function getCurrentWeather(Request $request)
{
    $city = $request->input('city');

    $response = $this->httpClient->request('GET', 'weather', [
        'query' => [
            'q' => $city,
            'appid' => $this->apiKey,
        ],
    ]);

    $weatherData = json_decode($response->getBody(), true);

    // Convertir temperatura de Kelvin a Celsius
    $temperatureCelsius = $weatherData['main']['temp'] - 273.15;

    return view('weather.current', compact('weatherData', 'temperatureCelsius'));
}


    //http://127.0.0.1:8000/api/weather/forecast?city=Barcelona
    public function getWeatherForecast(Request $request)
    {
        $city = $request->input('city');
    
        $response = $this->httpClient->request('GET', 'forecast', [
            'query' => [
                'q' => $city,
                'appid' => $this->apiKey,
            ],
        ]);
    
        $forecastData = json_decode($response->getBody(), true);
    
        // Convertir temperaturas de Kelvin a Celsius
        foreach ($forecastData['list'] as &$forecast) {
            $forecast['main']['temp'] = $forecast['main']['temp'] - 273.15;
        }
    
        return view('weather.forecast', compact('forecastData'));
    }
    

    //http://127.0.0.1:8000/api/weather/temperature?city=Barcelona
    public function getTemperature(Request $request)
    {
        $city = $request->input('city');
    
        $response = $this->httpClient->request('GET', 'weather', [
            'query' => [
                'q' => $city,
                'appid' => $this->apiKey,
                'units' => 'metric', // Solicitar unidades métricas (grados Celsius)
            ],
        ]);
    
        $weatherData = json_decode($response->getBody(), true);
    
        $temperature = $weatherData['main']['temp'];
    
        return view('weather.temperature', compact('city', 'temperature'));
    }
    
    
    
    
    //http://127.0.0.1:8000/api/weather/humidity?city=Barcelona
    public function getHumidity(Request $request)
    {
        $city = $request->input('city');
    
        $response = $this->httpClient->request('GET', 'weather', [
            'query' => [
                'q' => $city,
                'appid' => $this->apiKey,
            ],
        ]);
    
        $weatherData = json_decode($response->getBody(), true);
    
        $humidity = $weatherData['main']['humidity'];
    
        return view('weather.humidity', compact('city', 'humidity'));
    }
    
}

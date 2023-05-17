<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\TrelloController;

Route::get('/trello/boards', [TrelloController::class, 'getBoards'])->name('get.boards');
Route::post('/trello/boards', [TrelloController::class, 'createBoard'])->name('boards.create');
//Route::put('/trello/boards/{boardId}', [TrelloController::class, 'updateBoard'])->name('trello.boards.update');





// Agrega otras rutas según tus necesidades para interactuar con la API de Trello


Route::get('/weather/current', [WeatherController::class, 'getCurrentWeather'])->name('weather.current');
Route::get('/weather/forecast', [WeatherController::class, 'getWeatherForecast'])->name('weather.forecast');
Route::get('/weather/temperature', [WeatherController::class, 'getTemperature'])->name('weather.temperature');
Route::get('/weather/humidity', [WeatherController::class, 'getHumidity'])->name('weather.humidity');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



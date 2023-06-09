<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrelloController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

// routes/web.php

Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('/google-auth/callback', function () {
    $user_google = Socialite::driver('google')->stateless()->user();

    $user = User::updateOrCreate([
        'google_id' => $user_google->id,
    ], [
        'name' => $user_google->name,
        'email' => $user_google->email,
    ]);

    Auth::login($user);
    return redirect('/');
    
    // $user->token
});

Route::middleware(['auth'])->group(function () {
    Route::get('/api/trello', [HomeController::class, 'trelloApi'])->name('api.trello');
    Route::get('/api/weather', [HomeController::class, 'weatherApi'])->name('api.weather');

    Route::get('/trello/boards/create', [TrelloController::class, 'showCreateBoardForm'])->name('showCreateBoardForm');
    Route::get('/trello/showboards', [TrelloController::class, 'showBoards'])->name('trello.boards.index');
    Route::put('/trello/boards/{boardId}', [TrelloController::class, 'updateBoard'])->name('trello.boards.update');

    Route::get('/trello/boards', [TrelloController::class, 'getBoards'])->name('get.boards');
    Route::post('/trello/boards', [TrelloController::class, 'createBoard'])->name('boards.create');
    
    Route::get('/weather/current', [WeatherController::class, 'getCurrentWeather'])->name('weather.current');
    Route::get('/weather/forecast', [WeatherController::class, 'getWeatherForecast'])->name('weather.forecast');
    Route::get('/weather/temperature', [WeatherController::class, 'getTemperature'])->name('weather.temperature');
    Route::get('/weather/humidity', [WeatherController::class, 'getHumidity'])->name('weather.humidity');

    Route::get('/', function () {
        return view('welcome');
    });
    
    
});
Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

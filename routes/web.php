<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrelloController;
use App\Http\Controllers\HomeController;

// routes/web.php

Route::get('/api/trello', [HomeController::class, 'trelloApi'])->name('api.trello');
Route::get('/api/weather', [HomeController::class, 'weatherApi'])->name('api.weather');



Route::get('/trello/boards/create', [TrelloController::class, 'showCreateBoardForm'])->name('showCreateBoardForm');
Route::get('/trello/boards', [TrelloController::class, 'showBoards'])->name('trello.boards.index');
Route::put('/trello/boards/{boardId}', [TrelloController::class, 'updateBoard'])->name('trello.boards.update');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

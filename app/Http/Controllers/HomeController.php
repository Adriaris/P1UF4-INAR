<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function trelloApi()
    {
        // Lógica para la API de Trello
        return view('trello');
    }

    public function weatherApi()
    {
        // Lógica para la API del tiempo
        return view('weather');
    }
}

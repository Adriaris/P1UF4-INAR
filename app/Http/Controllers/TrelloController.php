<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TrelloController extends Controller
{
    protected $apiKey;
    protected $apiToken;
    protected $httpClient;
    protected $apiUrl = 'https://api.trello.com/1/';

    public function __construct()
    {
        $this->apiKey = env('TRELLO_API_KEY');
        $this->apiToken = env('TRELLO_API_TOKEN');
        $this->httpClient = new Client([
            'base_uri' => $this->apiUrl,
        ]);
    }

    public function showCreateBoardForm()
    {
        return view('createBoard');
    }

    public function getBoards(Request $request)
    {
        $response = $this->httpClient->request('GET', 'members/me/boards', [
            'query' => [
                'key' => $this->apiKey,
                'token' => $this->apiToken,
            ],
        ]);
    
        $boards = json_decode($response->getBody(), true);
    
        return view('boards', compact('boards'));
    }
    

    public function showBoards()
    {
        $response = $this->httpClient->request('GET', 'members/me/boards', [
            'query' => [
                'key' => $this->apiKey,
                'token' => $this->apiToken,
            ],
        ]);

        $boards = json_decode($response->getBody(), true);

        return view('index', compact('boards'));
    }


    public function createBoard(Request $request)
    {
        $errorMessage = null;
        
        try {
            $name = $request->input('name');
            $description = $request->input('description');

            $response = $this->httpClient->request('POST', 'boards', [
                'form_params' => [
                    'key' => $this->apiKey,
                    'token' => $this->apiToken,
                    'name' => $name,
                    'desc' => $description,
                ],
            ]);

            $createdBoard = json_decode($response->getBody(), true);

            return view('createBoard', compact('createdBoard', 'errorMessage'));
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return view('createBoard', compact('errorMessage'));
        }
    }

    
    public function updateBoard(Request $request, $boardId)
    {
        try {
            $name = $request->input('name');
        
            $response = $this->httpClient->request('PUT', 'boards/' . $boardId, [
                'query' => [
                    'key' => $this->apiKey,
                    'token' => $this->apiToken,
                    'name' => $name,
                ],
            ]);
        
            $updatedBoard = json_decode($response->getBody(), true);
        
            // Redireccionar a la página anterior con un mensaje de éxito
            return back()->with('success', 'Board updated successfully');
        } catch (\Exception $e) {
            // Manejo de errores
            
            // Redireccionar a la página anterior con un mensaje de error
            return back()->with('error', $e->getMessage());
        }
    }
    
    

}

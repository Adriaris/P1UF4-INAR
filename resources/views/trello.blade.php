@extends('layout')

@section('content')
    <div class="container text-center">
        <h1>Trello API</h1>

        <div class="mb-3">
            <a href="{{ route('get.boards') }}" class="btn btn-primary">Get Boards</a>
        </div>

        <div class="mb-3">
            <a href="{{ route('showCreateBoardForm') }}" class="btn btn-primary">Create Boards</a>
        </div>

        <div class="mb-3">
            <a href="{{ route('trello.boards.index') }}" class="btn btn-primary">Edit Boards</a>
        </div>
    </div>
@endsection

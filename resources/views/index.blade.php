@extends('layout')

@section('content')
    <div class="container text-center">
        <h1>Boards</h1>

        <ul class="list-group">
            @foreach ($boards as $board)
                <li class="list-group-item">
                    <form method="POST" action="{{ route('trello.boards.update', ['boardId' => $board['id']]) }}">
                        @method('PUT')
                        @csrf
                        <div class="input-group">
                            <input type="text" name="name" value="{{ $board['name'] }}" class="form-control">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

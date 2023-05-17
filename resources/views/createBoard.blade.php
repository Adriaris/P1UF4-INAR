@extends('layout')

@section('content')
    <div class="container text-center">
        <h1>Create Board</h1>

        <form action="{{ route('boards.create') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>

        @if (isset($errorMessage))
            <p class="text-danger">Error: {{ $errorMessage }}</p>
        @endif
    </div>
@endsection

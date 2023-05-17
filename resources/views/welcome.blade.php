@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>Welcome</h1>
        
        <p>Choose an API:</p>
        
        <div class="d-flex justify-content-center">
            <a href="{{ route('api.trello') }}" class="btn btn-primary mr-2">Trello API</a>
            <a href="{{ route('api.weather') }}" class="btn btn-primary">Weather API</a>
        </div>
    </div>
@endsection

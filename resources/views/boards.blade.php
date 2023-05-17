@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Board Details</h1>

        @foreach ($boards as $board)
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $board['name'] }}</h5>
                    <p class="card-text"><strong>Description:</strong> {{ $board['desc'] }}</p>
                    <p class="card-text"><strong>URL:</strong> <a href="{{ $board['url'] }}">{{ $board['url'] }}</a></p>
                    <p class="card-text"><strong>Created By:</strong> {{ $board['memberships'][0]['idMember'] }}</p>
                    <p class="card-text"><strong>Last Activity:</strong> {{ $board['dateLastActivity'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection

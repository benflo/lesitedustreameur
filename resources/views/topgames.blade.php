@extends('layouts.app')

@section('content')
    <h1>Meilleur jeux actuellement : </h1><br><br>
    @foreach($topGames['top'] as $game)
        <div>
            {{ $game['game']['name'] }} <br>
            <p>viewers : {{ $game['viewers'] }}</p>
            <img src="{{ $game['game']['logo']['large'] }}" alt="">
        </div>
    @endforeach
@endsection
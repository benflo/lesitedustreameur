@extends('layouts.app2')

@section('content')
    <h3>page d'édition de commentaire</h3>

    {!! Form::open() !!}
    {{ Form::token() }}
    {{ Form::label('commentaire', 'Message :') }}<br>
    {{ Form::textarea('commentaire', $commentaire->commentaire) }}<br>
    {{ Form::submit() }}
    {!! Form::close() !!}
@endsection
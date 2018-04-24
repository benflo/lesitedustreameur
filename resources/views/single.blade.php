@extends('layouts.app')

@section('content')

    <div class="col-md-10">
   <h1>{{$materiel->nom}}</h1><br>
@foreach($materiel->imagesActive as $image)
    <img src="{{ asset("images/$image->name") }}" width="auto">
@endforeach
<br><br>
        <h1>déscription :</h1>
        {!!$materiel->description!!}
        <h1>fiche :</h1>
        {!!$materiel->fiche!!}

        @if($materiel->liens!=NULL)
            <iframe width="420" height="315" src="{{ $materiel->liens }}">
            </iframe>
        @else

        @endif
        <h2>Commentaire :</h2><br>
        @foreach($materiel->commentaires as $commentaire)
        {{$commentaire->auteur}} {{$commentaire->created_at}}<br>
            {!!$commentaire->commentaire!!}
            @if(Route::has('login') && Auth::user()->name==$commentaire->auteur)
                @auth()
            <a href="{{ route('edit', ['id'=> $commentaire->id]) }}">modifier</a><br>
                @endauth
            @endif
        @endforeach

    @if(Route::has('login'))
            @auth()
        <form method="post" >
            {{csrf_field()}}
            <textarea name="commentaire" id="commentaire" placeholder="commentaire"></textarea><input value="valider" type="submit"/>
        </form>
            @endauth
        @endif


    </div>

    @endsection

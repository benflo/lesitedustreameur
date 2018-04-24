@extends('layouts.app2')

@section('content')

    <div class="col-md-10">
        <h1>{{$materiel->nom}}</h1><br>
        @foreach($materiel->imagesActive as $image)
            <img src="{{ asset("images/$image->name") }}" width="auto">
        @endforeach
        <br>
        description :
        {!! $materiel->description !!}
        fiche :
        {!! $materiel->fiche !!}

        @if($materiel->liens!=NULL)
            <iframe width="420" height="315" src="{{ $materiel->liens }}" allowfullscreen>
            </iframe>
        @else

        @endif
        @if(Route::has('login'))
            @auth()
                <form method="post" >
                    {{csrf_field()}}

                    commentaire: <br>
                    <textarea name="commentaire" id="commentaire"></textarea><br><input value="valider" type="submit"/>
                </form>
            @endauth
        @endauth

        @if(!$materiel->commentaires->isEmpty())
            <h3>Commentaires :</h3>
            @foreach($materiel->commentaires as $commentaire)
                {{$commentaire->auteur}} {!! $commentaire->created_at !!}
                {!! $commentaire->commentaire !!}
                <a href="{{ route('commentaire.edit', ['id'=> $commentaire->id]) }}">modifier</a>
                <a href="{{ route('commentaire.delete', ['id' => $commentaire->id]) }}">supprimer</a><br>
            @endforeach
        @endif
    </div>




@endsection

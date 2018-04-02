@extends('layouts.app')

@section('content')

    <div class="col-md-2">
    @foreach($categories as $category)
        <li><input type="checkbox">{{ $category->categorie }} </li>
    @endforeach
</div>
    <div class="col-lg-3">
<h1>{{$materiel->nom}}</h1><br>
@foreach($materiel->imagesActive as $image)
    <img src="{{ asset("images/$image->name") }}" width="100">
@endforeach
<br><br>
        {{$materiel->description}}<br>
        {{$materiel->fiche}}<br>

        @if($materiel->liens!=NULL)
            <iframe width="420" height="315" src="{{ $materiel->liens }}">
            </iframe>
        @else

        @endif
        <br>
        <h2>Commentaire :</h2><br>
        @foreach($materiel->commentaires as $commentaire)
            {{$commentaire->created_at}}<br>
            {{$commentaire->auteur}}<br>
            {{$commentaire->commentaire}}
        @endforeach

    @if(Route::has('login'))
            @auth()
        <form method="post" >
            {{csrf_field()}}
            <textarea name="commentaire" id="commentaire" placeholder="commentaire"></textarea>
            <input value="valider" type="submit"/>
        </form>
            @endauth
        @endif


    </div>
    @endsection

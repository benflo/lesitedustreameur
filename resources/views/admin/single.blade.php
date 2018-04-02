@extends('layouts.app2')

@section('content')

    <div class="col-md-2">
        @foreach($categories as $category)
            <li><input type="checkbox" name="active" value="<?php echo $category->active ?>" <?php if ($category->active === 1): {echo "checked";} endif; ?>>{{ $category->categorie }} </li>

        @endforeach
    </div>
    <div class="col-lg-3">
        <h1>{{$materiel->nom}}</h1><br>
        @foreach($materiel->imagesActive as $image)
            <img src="{{ asset("images/$image->name") }}" width="100">
        @endforeach
        <br>
        {{$materiel->description}}<br>
        {{$materiel->fiche}}<br>

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
                    <textarea name="commentaire" id="commentaire"></textarea>
                    <input value="valider" type="submit"/>
                </form>
            @endauth
        @endauth

        @if(!$materiel->commentaires->isEmpty())
            <h3>Commentaires :</h3>
            @foreach($materiel->commentaires as $commentaire)
                <li>{{ $commentaire->commentaire }}</li>
            @endforeach
        @endif
    </div>


@endsection

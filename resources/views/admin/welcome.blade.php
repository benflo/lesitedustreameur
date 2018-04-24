@extends('layouts.app2')

@section('content')

    <div class="col-md-2 filter">
        <div class="panel-heading">Catégorie</div>
        @foreach($categories as $category)
            <li><input type="checkbox" name="active"
                       value="<?php echo $category->active ?>" <?php if ($category->active === 1): {
                    echo "checked";
                } endif; ?>> {{ $category->categorie }}</li>
        @endforeach
    </div>
    <div class="col-md-10">
        <div>Vous voici arrivée sur le site du streameur ce site a pour but d'aider les personne souhaitant ce lancer dans
            le streaming de pouvoir le faire en sachant quelle type de matériel il vous faut pour débuter
        </div>
        @foreach($materiels as $materiel)
            <div class="col-md-4 {{ $materiel->categorie->categorie }}">
                <a href="{{route('admin.single',['id'=> $materiel->id])}}">{{$materiel->nom}}</a><br>
                @foreach($materiel->imagesActive as $image)
                    <img src="{{ asset("images/$image->name") }}" width="100">
                @endforeach
                <br>
                <a href="{{route('admin.delete', ['id'=> $materiel->id])}}">supprimer</a>
                <a href="{{route('admin.updateview', ['id'=> $materiel->id])}}">modifier</a><br>
                <br>
            </div>

        @endforeach
        <br>
    </div>
@endsection
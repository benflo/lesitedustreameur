@extends('layouts.app')

@section('content')
    <div class="col-md-2">
        @foreach($categories as $category)
            <li><input type="checkbox" name="active" value="<?php echo $category->active ?>" <?php if ($category->active === 1): {echo "checked";} endif; ?>>{{ $category->categorie }} </li>
        @endforeach
    </div>
        <div>Vous voici arrivée sur le site du streameur se site a pour but d'aider les personne souhaitant se lancer dans le streaming de pouvoir le faire en sachant quelle type de matériel il vous faut pour débuter</div>

        @foreach($materiels as $materiel)
            <div class="col-lg-3">
                <a href="{{ route('single',['id'=> $materiel->id])}}">{{$materiel->nom}}</a> <br>
                {{$materiel->description}} <br>

                @foreach($materiel->imagesActive as $image)
                    <img src="{{ asset("images/$image->name") }}" width="100">
                @endforeach
            </div>
        @endforeach
@endsection
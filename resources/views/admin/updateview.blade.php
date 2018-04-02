@extends('layouts.app2')

@section('content')
    <title>Modifier matériel</title>
    <form method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Matériel</div>
                        <label for="nom" class="col-md-6">nom : </label><br><br>
                        <div class="col-md-6"><input type="text" name="nom" placeholder='"nom"'
                                                     value="{{$materiel->nom}}"/></div>
                        <br><br>
                        <label for="description" class="col-md-6">description : </label></br></br>
                        <textarea name="description" id="description" rows="4" cols="50"
                                  placeholder="description">{{$materiel->description}}</textarea><br>
                        <label for="fiche" class="col-md-6">fiche : </label></br><br>
                        <textarea name="fiche" id="fiche" rows="4" cols="50"
                                  placeholder="fiche">{{$materiel->fiche}}</textarea>
                        <br>
                        <label for="image">Image : </label>
                        @foreach($materiel->imagesActive as $image)
                            <img src="{{ asset("images/$image->name") }}" width="100">
                        @endforeach
                        <input type="file" name="img[]" multiple>

                        <label for="categorie" class="col-md-6">Categorie :</label><br><br>
                        <select name="categorie" id="categorie" class="form-control-static">
                            @foreach($categories as $categorie)
                                <option value="{{$categorie->id}}">{{$categorie->categorie}}</option>
                            @endforeach
                        </select>
                        <a href={{url('/admin/AjoutCategorie')}}> Ajout Categorie</a><br><br>
                        <label for="liens" class="col-md-6">Liens :</label><br><br>
                        <div class="col-md-6">
                            <input type="text" name="liens" placeholder='"liens"' value="{{ $materiel->liens }}"/>
                        </div>
                        <br><br>
                        <input type="submit" value="valider"/>
                    </div>
                </div>
            </div>
    </form>
@endsection()

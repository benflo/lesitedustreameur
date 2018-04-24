@extends('layouts.app2')

@section('content')
    <form method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Matériel</div>
                        <label for="nom" class="col-md-6">nom : </label><br><br>
                        <div class="col-md-6"><input type="text" name="nom" placeholder='"nom"'/></div>
                        <br><br>
                        <label for="description" class="col-md-6">description : </label><br><br>
                        <textarea name="description" id="description"></textarea><br>
                       <label for="fiche" class="col-md-6">fiche : </label><br><br>
                        <textarea name="fiche" id="fiche"></textarea>
                        <br>
                        <label for="image" class="col-md-6">Image : </label><br><br>
                        <input type="file" name="img[]" class="col-md-6"><br><br>
                        <label for="categorie" class="col-md-6">Categorie :</label><br><br>
                        <select name="categorie" id="categorie" class="form-control-static">
                            @foreach($categories as $categorie)
                                <option value="{{$categorie->id}}">{{$categorie->categorie}}</option>
                            @endforeach
                        </select>
                        <a href={{url('/admin/AjoutCategorie')}}> Ajout Categorie</a><br>
                        <br>
                        <label for="liens" class="col-md-6">Liens :</label><br><br>
                        <div class="col-md-6"><input type="text" name="liens" placeholder='"liens"' value=""/></div>
                        <br><br>
                        <label for="col-md-6">Magasins :</label><br>
                        <textarea name="magasin" id="" cols="30" rows="10"></textarea>

                        <br><br>
                        <input type="submit" value="valider"/>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection()


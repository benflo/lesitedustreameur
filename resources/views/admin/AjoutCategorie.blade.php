@extends('layouts.app2')

@section('content')
    <form method="post" >
        {{csrf_field()}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Categorie</div>
                    <label for="nom"> Categorie : </label></br></br>
                    <input type="text" name="categorie" placeholder= '"ajouter une catégorie"'/><br><br>

                    <input type="submit" value="valider"/>
                </div>
            </div>
        </div>
    </div>
    </form>



    @endsection()
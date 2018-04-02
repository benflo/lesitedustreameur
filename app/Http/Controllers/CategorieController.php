<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function createCategorie()
    {
    return view('/admin/AjoutCategorie');
    }

    public function store(request $request){

        $categorie=$request->input('categorie');

        $categorie= new Categorie([
           'categorie' => $categorie,
        ]);
        $categorie->save();

        return redirect()->route('category.add');
    }
}

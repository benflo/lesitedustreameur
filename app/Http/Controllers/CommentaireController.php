<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Commentaires;
use App\Materiel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{

    public function store(Request $request){

        $commentaires=new Commentaires([
            'auteur' => Auth::user()->name,
            'commentaire' => $request->input('commentaire'),
            'materiel_id' => request('id')
        ]);

        $commentaires->save();

        return redirect()->back();
    }

    public function show(Request $request){
        $id = $request->id;
        $commentaire = Commentaires::find($id);


            return view('edit', compact('commentaire'));

    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $message = Commentaires::find($id);

        $message->commentaire = $request->input('commentaire');

        $message->save();
        return redirect()->back();

    }

    public function delete($id){
        $commentaires = Commentaires::find($id);
        $commentaires->delete();

        return redirect()->back();
    }
}



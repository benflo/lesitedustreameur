<?php

namespace App\Http\Controllers;

use App\videos;
use App\Image;
use Illuminate\Http\Request;
use App\Materiel;
use App\Categorie;
use  Illuminate\Support\Facades\Auth;


class MaterielController extends Controller
{
    public function show()
    {
        $materiels = Materiel::find();
        $categories = Categorie::all();

        return view('welcome', compact('materiels'), compact('categories'));
    }

    public function createMateriel()
    {
        $categories = Categorie::all();

        return view('/admin/AjoutMateriel', compact('categories'));
    }

    public function store(request $request)
    {
        $materiel = new Materiel([
            'nom' => $request->input('nom'),
            'description' => $request->input('description'),
            'fiche' => $request->input('fiche'),
            'liens' => $request->input('liens'),
            'categorie_id' => $request->input('categorie')
        ]);
        $materiel->save();


        $images = $request->file('img');
        foreach ($images as $image) {
            $imageName = $image->getClientOriginalName();
            $filename = time() . $imageName;
            if ($request->hasFile('img')) {
                $file = $image;
                $file->move('images', $filename);
            }

            $img = new Image([
                'name' => $filename,
                'materiel_id' => $materiel->id,
            ]);
            $img->save();
        }

        return redirect()->route('admin.welcome');
    }

    public function updateview(request $request){
        $id = $request->id;
        $materiel = Materiel::find($id);
        $categories= Categorie::all();

        return view('admin.updateview', compact('materiel'), compact('categories'));

    }
    public function update(request $request)
    {
        $id = $request->id;
        $materiel = Materiel::find($id);
        $materiel->nom = $request->input('nom');
        $materiel->description = $request->input('description');
        $materiel->fiche = $request->input('fiche');
        $materiel->liens = $request->input('liens');

        $materiel->save();

        return redirect()->route('admin.welcome');

    }

    public function delete($id)
    {
        $materiels = Materiel::find($id);
        $materiels->delete();

        return redirect()->route('admin.welcome');

    }

    public function single(Request $request)
    {

        $categories = Categorie::all();
        $id = $request->id;
        $materiels = Materiel::find($id);

        if (isset(Auth::User()->role) && Auth::User()->role === 'admin') {
            return view('admin.single', ['materiel' => $materiels], compact('categories'));
        }

        return view('single', [
            'materiel' => $materiels,
            'categories' => $categories
        ]);
    }

}

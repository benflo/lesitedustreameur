<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use App\Materiel;



class WelcomeController extends Controller
{


    public function index()
    {
        $materiels = Materiel::all();
        $categories = Categorie::all();

        if (isset(Auth::User()->role) && Auth::User()->role === 'admin') {
            return view('admin.welcome', compact('materiels'), compact('categories'));
        }

        return view('welcome', compact('materiels'), compact('categories'));
    }
}



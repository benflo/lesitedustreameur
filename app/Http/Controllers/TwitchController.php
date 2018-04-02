<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TwitchApi;
use GuzzleHttp\Client;

class TwitchController extends Controller
{
    public function getTopGames()
    {
        $options = [
            'limit' => 5,
        ];
        $topGames = TwitchApi::topGames($options);

        return view('topgames', [
            'topGames' => $topGames
        ]);
    }
}


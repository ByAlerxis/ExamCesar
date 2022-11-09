<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AmiiboController extends Controller
{
    public function obtener(){

        $response = Http::get('https://amiiboapi.com/api/amiibo/');
        $amiibos = $response->json()['amiibo'];

        return view('amiibo', compact('amiibos'));
    }
}

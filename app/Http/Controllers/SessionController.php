<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function addData(Request $request)
    {
        $request->session()->put('name','erritali');
        echo "valeur ajouté";
    }

    public function showData(Request $request)
    {
        if($request->session()->has('name'))
        echo $request->session()->get('name');
     else
        echo 'Pas de valeur dans la session';
    }

    public function deleteData(Request $request)
    {
        $request->session()->forget('name');
        echo "Données supprimé de la session";
    }
}

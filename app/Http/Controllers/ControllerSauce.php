<?php

namespace App\Http\Controllers;

use App\Models\Sauce;
use Illuminate\Http\Request;

class ControllerSauce extends Controller
{
    public function index()
    {
        $sauces = Sauce::all();
        return response()->json($sauces);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'userId' => 'required|integer', // par la suite on pourrait améliorer en faisant en sorte que celà soit l'id de l'utilisateur connecté
            'name' => 'required|string',
            'manufacturer' => 'required|string',
            'description' => 'required|string',
            'mainPepper' => 'required|string',
            'imageUrl' => 'required|url',
            'heat' => 'required|integer|min:1|max:10',
            'likes' => 'integer',
            'dislikes' => 'integer',
            'usersLiked' => 'array',
            'usersDisliked' => 'array'
        ]);

        $sauce = Sauce::create($validatedData);
        return response()->json($sauce, 201);
    }

    public function show($id)
    {
        $sauce = Sauce::find($id);
        if ($sauce) {
            return response()->json($sauce);
        } else {
            return response()->json(['error' => 'Sauce not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $sauce = Sauce::find($id);
        if ($sauce) {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'manufacturer' => 'required|string',
                'description' => 'required|string',
                'mainPepper' => 'required|string',
                'imageUrl' => 'required|url',
                'heat' => 'required|integer|min:1|max:10',
            ]);

            $sauce->update($validatedData);
            return response()->json($sauce);
        } else {
            return response()->json(['error' => 'Sauce not found'], 404);
        }
    }

    public function destroy($id)
    {
        $sauce = Sauce::find($id);
        if ($sauce) {
            $sauce->delete();
            return response()->json(['message' => 'Sauce deleted successfully']);
        } else {
            return response()->json(['error' => 'Sauce not found'], 404);
        }
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Sauce;
use Illuminate\Http\Request;

class ControllerSauce extends Controller
{
    public function index()
    {
        $sauces = Sauce::all();
        return view('sauces.index', compact('sauces'));
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'manufacturer' => 'required',
            'description' => 'required',
            'mainPepper' => 'required',
            'imageUrl' => 'required',
            'heat' => 'required'
        ]);
        Sauce::create($request->all());
        return redirect()->route('sauces.index')->with("success", "Sauce ajoutée");
    }

    public function store(Request $request){
        $sauce = Sauce::find($request->id);
        return view('#', compact('sauce'));
    }

    public function show($id){
        $sauce = Sauce::find($id);
        return view('sauces.show', compact('sauce'));
    }

    public function edit($id){
        $sauce = Sauce::find($id);
        return view('sauces.edit', compact('sauce'));
    }

    public function update(Request $request, $id){
        if ($request->validate([
            'name' => 'required|string',
            'manufacturer' => 'required|string',
            'description' => 'required|string',
            'mainPepper' => 'required|string',
            'imageUrl' => 'required|url',
            'heat' => 'required|min:1|max:10',
//            'likes',
//            'dislikes',
//            'usersLiked',
//            'usersDisliked',
        ]))
        {
            $sauce = Sauce::find($id);
            $sauce->update($request->all());
            return redirect()->route('sauces.show', $sauce->id)->with("success", "Sauce modifiée");
        }
        else{
            return redirect()->route('sauces.index')->with("error", "Sauce non modifiée");
//            var_dump($request->all());
        }
    }

    public function destroy(Sauce $sauce){
        $sauce->delete();
        return redirect()->route('sauces.index')->with("success", "Sauce supprimée");
    }


}

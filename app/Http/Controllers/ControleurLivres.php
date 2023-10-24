<?php

namespace App\Http\Controllers;
use App\Models\livres;
use Illuminate\Http\Request;

class ControleurLivres extends Controller
{
    public function index()
    {
        $livres = livres::orderBy('titre','asc')->paginate(5);
        return view('livres.index', compact('livres'));
    }

    public function create()
    {
        return view('livres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'titre' => 'required',
            'auteur' => 'required',
            'prix' => 'required',
            'date_publication' => 'required',
            'isbn' => 'required',
        ]);

        if($request->image){
            $nomDossier = $request->isbn.".".$request->image->extension();
            $request->image->move(public_path('images'),$nomDossier);
            $request->merge(['image'=>$nomDossier]);
        }

        livres::create($request->post());

        return redirect()->route('livres.index')->with('success','Livre crée.');
    }

    public function show(livres $livre)
    {
        return view('livres.show',compact('livre'));
    }

    public function edit(livres $livre)
    {
        return view('livres.edit',compact('livre'));
    }

    public function update(Request $request, livres $livre)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'titre' => 'required',
            'auteur' => 'required',
            'pages' => 'required',
            'prix' => 'required',
            'date_publication' => 'required',
            'editeur' => 'required',
            'isbn' => 'required',
        ]);
        if($request->image){
            $nomDossier = $request->isbn.".".$request->image->extension();
            remove(public_path('images/'.$livre->image));
            $request->image->move(public_path('images'),$nomDossier);
            $request->merge(['image'=>$nomDossier]);
        }



        // if($request->image){
        //     $nomDossier = $request->isbn.".".$request->image->extension();
        //     $request->image->move(public_path('images'),$nomDossier);
        //     $request->merge(['image'=>$nomDossier]);
        // }

        $livre->fill($request->post())->save();

        return redirect()->route('livres.index')->with('success','Livre sauvegardé.');
    }

    public function destroy(livres $livre)
    {
        $livre->delete();
        return redirect()->route('livres.index')->with('success','Livre supprimé.');
    }
}

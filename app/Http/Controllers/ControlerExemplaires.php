<?php

namespace App\Http\Controllers;
use App\Models\livres;
 
use App\Models\exemplaires;
use Illuminate\Http\Request;


class ControlerExemplaires extends Controller
{
    public function index($livre_id)
    {
        $exemplaires = exemplaires::where('livre', $livre_id)->paginate(5);
        $livre_titre = livres::where('id', $livre_id)->value('titre');
        return view('exemplaires.index', compact('exemplaires', 'livre_id', 'livre_titre'));
    }

    
    public function show($livre_id, exemplaires $exemplaire)
        {
            return view('livres.exemplaires.show',$livre_id, compact('exemplaires', $livre_id));
        }

        public function create($livre_id)
        {
            $livre_titre = livres::where('id', $livre_id)->value('titre');
            return view('exemplaires.create', compact('livre_id', 'livre_titre'));
        }

    public function store(Request $request, $livre_id)
    {
        $request->validate([
            'etat' => 'required',
            'dispo' => 'required',
            'retour' => 'nullable',
        ]);
        $data = array_merge($request->post(),[
            'livre' => $livre_id,
        ]) ;

        $exemplaires = exemplaires::create($data);

        return redirect()->route('livre.exemplaires.index', $livre_id)->with('success','Exemplaire crée.');
    }

    public function edit($livre_id, exemplaires $exemplaire)
    {
        $livre_titre = livres::where('id', $livre_id)->value('titre');
        return view('exemplaires.edit',compact('exemplaire', 'livre_id', 'livre_titre'));
    }

    public function update(Request $request, $livre_id, exemplaires $exemplaire)
    {
        $request->validate([
            'etat' => 'required',
            'dispo' => 'required',
            'retour' => 'nullable',
        ]);
        $data = array_merge($request->post(),[
            'livre' => $livre_id,
        ]) ;

        $exemplaire->fill($data)->save();

        return redirect()->route('livre.exemplaires.index', $livre_id)->with('success','Exemplaire sauvegardé.');
    }
    public function destroy($livre_id, exemplaires $exemplaire)
    {
        $exemplaire->delete();
        return redirect()->route('livre.exemplaires.index', $livre_id)->with('success','Exemplaire supprimé.');
    }
// }
}
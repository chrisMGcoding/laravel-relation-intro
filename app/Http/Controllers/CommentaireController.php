<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commentaire = Commentaire::all();
        return view('pages.commentaire', compact('commentaire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.commentairecreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom"=>["required"],
            "prenom"=>["required"],
            "DateDePublication"=>["required"],
            "contenu"=>["required"],
        ]);

        $commentaire = new Commentaire;

        $commentaire->nom = $request->nom;
        $commentaire->prenom = $request->prenom;
        $commentaire->DateDePublication = $request->DateDePublication;
        $commentaire->contenu = $request->contenu;
        $commentaire->video_id = $request->video_id;

        $commentaire->save();

        return redirect()->route('commentaires.index')->with('message', 'Commentaire ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Commentaire $commentaire)
    {
        return view('crud.commentaireshow', compact('commentaire'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Commentaire $commentaire)
    {
        return view('crud.commentaireedit', compact('commentaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        $request->validate([
            "nom"=>["required"],
            "prenom"=>["required"],
            "DateDePublication"=>["required"],
            "contenu"=>["required"],
        ]);

        $commentaire->nom = $request->nom;
        $commentaire->prenom = $request->prenom;
        $commentaire->DateDePublication = $request->DateDePublication;
        $commentaire->contenu = $request->contenu;

        $commentaire->save();

        return redirect()->route('commentaires.index')->with('message', 'Commentaire modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();

        return redirect()->route('commentaires.index')->with('message', 'Commentaire supprimé');
    }
}

<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;


class EtudiantController extends Controller
{
    public function index (){
        $etudiants = Etudiant::orderBy("nom","asc")->paginate(5);
        return view("etudiant", compact("etudiants"));
    }
    public function create (){
        $classes = Classe::all();
        return view("createEtudiant", compact("classes"));
    }

    public function edit (Etudiant $etudiant){
        $classes = Classe::all();
        return view("editEtudiant", compact("etudiant", "classes"));
    }
    public function store (Request $request){

        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "classe_id"=>"required"
        ]);
        Etudiant::create([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "classe_id"=>$request->classe_id
        ]);
        return back()->with("success", "Etudiant ajoute avec succè!");
    }

    public function update (Request $request, Etudiant $etudiant){
        //$etudiant = Etudiant::findOrFail($id);

        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "classe_id"=>"required"
        ]);
        $etudiant->update([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "classe_id"=>$request->classe_id
        ]);
        return back()->with("success", "Etudiant mis à jour avec succè!");
    }

    /*public function delete ($etudiant){
       $nom_complet = $etudiant->nom."". $etudiant->prenom;
       $etudiant->delete();
       return back()->with("successDelete", "L'étudiant '$nom_complet' supprimé avec succè!");
    }*/
    public function delete(Etudiant $etudiant)
    {
        // Vérifier si l'étudiant existe
        if (!$etudiant) {
            return back()->with("error", "Étudiant introuvable.");
        }

        $nom_complet = $etudiant->nom . " " . $etudiant->prenom;

        // Supprimer l'étudiant
        $etudiant->delete();

        return back()->with("successDelete", "L'étudiant '$nom_complet' a été supprimé avec succès!");
    }


}

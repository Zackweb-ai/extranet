<?php

namespace App\Http\Controllers;

use App\Models\Groupe;  // Assurez-vous d'importer le modèle Groupe
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupère tous les groupes
        $groupes = Groupe::all();
        return response()->json($groupes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Cette méthode est souvent inutile dans une API RESTful
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation de la requête
        $request->validate([
            'nom' => 'required|string|max:255', // Ajout d'une validation plus robuste
        ]);

        // Création d'un nouveau groupe avec le nom donné
        $groupe = Groupe::create([
            'nom' => $request->nom,
        ]);

        // Retourner une réponse avec le groupe créé
        return response()->json($groupe, 201);  // Code HTTP 201 pour ressource créée
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Trouve un groupe spécifique par ID
        $groupe = Groupe::find($id);

        // Vérifier si le groupe existe
        if (!$groupe) {
            return response()->json(['message' => 'Groupe non trouvé'], 404);
        }

        // Retourner les données du groupe
        return response()->json($groupe);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Pas nécessaire dans une API RESTful, mais tu peux ajouter des comportements de mise à jour
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation de la requête
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        // Trouve le groupe à mettre à jour
        $groupe = Groupe::find($id);

        if (!$groupe) {
            return response()->json(['message' => 'Groupe non trouvé'], 404);
        }

        // Met à jour le groupe avec les nouvelles données
        $groupe->update([
            'nom' => $request->nom,
        ]);

        return response()->json($groupe);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Trouve le groupe à supprimer
        $groupe = Groupe::find($id);

        if (!$groupe) {
            return response()->json(['message' => 'Groupe non trouvé'], 404);
        }

        // Supprime le groupe
        $groupe->delete();

        return response()->json(['message' => 'Groupe supprimé avec succès']);
    }
}

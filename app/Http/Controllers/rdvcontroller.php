<?php

namespace App\Http\Controllers;

use App\Models\rdv;
use App\Models\reclamation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class rdvcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
     public function afficher()
     {
         // Récupérer l'utilisateur connecté
         $user = Auth::user();
     
         // Récupérer les réclamations envoyées et reçues par l'utilisateur
         $reclamations = Reclamation::where('from_id', $user->id)
                                     ->orWhere('to_id', $user->id)
                                     ->pluck('id');
     
         // Réaliser une jointure entre les réclamations et les rendez-vous
         $rdvs = Rdv::join('reclamations', 'rdvs.reclamation_id', '=', 'reclamations.id')
                     ->whereIn('reclamations.id', $reclamations)
                     ->get();
     
         return view('afficher', compact('rdvs'));
     }
    public function createrdv(string $id)
    {
        $reclamation_id = reclamation::findOrFail($id);
        return view ('RDV.createrdv', compact('reclamation_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ){

       rdv::create($request->all());
 
        return redirect()->route('RDV.store')->with('success', 'Rendez vous ajouter avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $num)
    {
        $product =rdv::findOrFail($num);
  
        $product->delete();
  
        return redirect()->route('RDV.index', ['num' => $product->num])->with('success', 'rendez vous supprimer avec succes');
    }
}

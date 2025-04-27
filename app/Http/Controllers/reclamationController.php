<?php
  
namespace App\Http\Controllers;
  use Illuminate\Support\Facades\Auth;
  use App\Models\User;

use Illuminate\Http\Request;
use App\Models\reclamation;
 
class reclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
    
        // Récupérer les réclamations de l'utilisateur connecté
    
        // Récupérer les réclamations destinées à l'utilisateur connecté
        $reclamationsRecues = reclamation::where('to_id', $user->id)->orderBy('created_at', 'DESC')->get();
    
        $reclamationsEmises = reclamation::where('from_id', $user->id)->orderBy('created_at', 'DESC')->get();
    
    return view('index', compact('reclamationsEmises', 'reclamationsRecues'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        return view('products.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        reclamation::create($request->all());
 
        return redirect()->route('products')->with('success', 'reclamation envoyé avec succes');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = reclamation::findOrFail($id);
  
        return view('products.show', compact('product'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = reclamation::findOrFail($id);
  
        return view('products.edit', compact('product'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = reclamation::findOrFail($id);
  
        $product->update($request->all());
  
        return redirect()->route('products')->with('success', 'product updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product =reclamation::findOrFail($id);
  
        $product->delete();
  
        return redirect()->route('products')->with('success', 'Réclamation supprimé avec succes');
    }
    
    public function getRecipientId(Request $request)
    {
        $recipientName = $request->query('name');
        $recipient = User::where('name', $recipientName)->first();

        if ($recipient) {
            return response()->json(['id' => $recipient->id]);
        } else {
            return response()->json(['error' => 'Destinataire non trouvé'], 404);
        }
    }
}
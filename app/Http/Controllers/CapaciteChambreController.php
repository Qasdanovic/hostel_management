<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\CapaciteChambre;
use Illuminate\Support\Facades\DB;

class CapaciteChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $capacites = CapaciteChambre::all() ;
        return view("capacite_chambre.index", compact("capacites"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("capacite_chambre.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titre_capacite' => ['required'],
            'numero_capacite' => ['required'],
        ]);

        CapaciteChambre::create($data);

        return redirect()->route('capacite.index')->with("success", "new capacite added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(CapaciteChambre $capacite_chambre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $capacite = CapaciteChambre::findOrFail($request->capacite);
        return view('capacite_chambre.edit', compact("capacite"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'titre_capacite' => ['required'],
            'numero_capacite' => ['required'],
        ]);

        $capacite = CapaciteChambre::findOrFail($request->capacite);
        $capacite->update($data);
        return redirect()->route('capacite.index')->with("success", "capacite updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $check = DB::table("chambres")
                    ->where("capacite_chambre_id", "=", $request->capacite)
                    ->exists();

        $capacite = CapaciteChambre::findOrFail($request->capacite);

        if($check){
            return back()->with('error', 'Opération interdite : Capacite déjà lié à une chambre');
        };

        $capacite->delete();
        return back()->with('success', 'supprimer avec success');
    }
}

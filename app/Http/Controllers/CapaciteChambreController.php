<?php

namespace App\Http\Controllers;

use App\Models\Capacite_chambre;
use Illuminate\Http\Request;

class CapaciteChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $capacites = Capacite_chambre::all() ;
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

        Capacite_chambre::create($data);

        return redirect()->route('capacite.index')->with("success", "new capacite added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Capacite_chambre $capacite_chambre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $capacite = Capacite_chambre::findOrFail($request->capacite);
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

        $capacite = Capacite_chambre::findOrFail($request->capacite);
        $capacite->update($data);
        return redirect()->route('capacite.index')->with("success", "capacite updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $cap = Capacite_chambre::findOrFail($request->capacite);
        $cap->delete();
        return redirect()->route('capacite.index')->with("success", "capacite deleted successfully");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TarifChambre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarifChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarifs = TarifChambre::all() ;
        return view("tarif.index", compact("tarifs")) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tarif.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "prix_base_nuit" => "required|numeric",
            "prix_base_passage" => "required|numeric",
            "n_prix_nuit" => "required|numeric",
            "n_prix_passage" => "required|numeric",
        ]) ;

        TarifChambre::create($data) ;
        
        return redirect()->route(route: "tarifs.index")->with("success", "new tarif added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(TarifChambre $tarif_chambre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $tarif = TarifChambre::findOrFail($request->tarif) ;
        return view("tarif.edit", compact("tarif")) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            "prix_base_nuit" => "required|numeric",
            "prix_base_passage" => "required|numeric",
            "n_prix_nuit" => "required|numeric",
            "n_prix_passage" => "required|numeric",
        ]) ;

        $tarif = TarifChambre::findOrFail($request->tarif) ;
        $tarif->update($data);
        
        return redirect()->route(route: "tarifs.index")->with("success", "tarif updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $tarif = TarifChambre::findOrFail($request->tarif);

        $check = DB::table("chambres")
                    ->where("tarif_chambre_id", "=", $request->tarif)
                    ->exists();

        if($check){
            return back()->with('error', 'Opération interdite : Tarif déjà lié à une chambre');
        }

        $tarif->delete() ;
        return redirect()->route(route: "tarifs.index")->with("success", "tarif deleted successfully");
    }
}

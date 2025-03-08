<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\TarifChambre;
use App\Models\TypeChambre;
use Illuminate\Http\Request;
use App\Models\CapaciteChambre;
use Illuminate\Support\Facades\DB;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chambres = Chambre::with( "type", "capacite", "tarif")->simplePaginate(5);


        // $chambres = DB::table('chambres')
        //     ->join('type_chambres', 'chambres.type_chambre_id', '=', 'type_chambres.id')
        //     ->join('capacite_chambres', 'chambres.capacite_chambre_id', '=', 'capacite_chambres.id')
        //     ->join('tarif_chambres', 'chambres.tarif_chambre_id', '=', 'tarif_chambres.id')
        //     ->select(["chambres.id as chambre_id", "chambres.*", "tarif_chambres.*", "capacite_chambres.*", "type_chambres.*"])
        //     ->get();



        return view("chambres.index", compact("chambres"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = TypeChambre::all() ;
        $capacites = CapaciteChambre::all() ;
        $tarifs = TarifChambre::all() ;


        return view("chambres.create", [
            "tarifs" => $tarifs ,
            "capacites" => $capacites ,
            "types" => $types ,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "numero_chambre" => "required",
            "nombre_adultes_enfants_chambre" => "required",
            "renfort_chambre" => "required",
            "etage_chambre" => "required",
            "nbr_lits_chambre" => "required",
            "image_chambre" => "image|mimes:png,jpg,jpeg,svg|max:2024",
            "tarif_chambre_id" => "required|exists:tarif_chambres,id",
            "type_chambre_id" => "required|exists:type_chambres,id",
            "capacite_chambre_id" => "required|exists:capacite_chambres,id",
        ]) ;

        if ($request->hasFile('image_chambre')) {
            $image = $request->file('image_chambre');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('chambres', $imageName, 'public');
    
            $data["image_chambre"] = $imagePath ;
            Chambre::create($data);
        }

        // dd($request->all()) ;
        return redirect()->route('chambres.index')->with('success', 'Chambre ajoutée avec success!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $chambre = DB::table("chambres")
                        ->join("tarif_chambres", "chambres.tarif_chambre_id", "=", "tarif_chambres.id")
                        ->join("type_chambres", "chambres.type_chambre_id", "=", "type_chambres.id")
                        ->join("capacite_chambres", "chambres.capacite_chambre_id", "=", "capacite_chambres.id")
                        ->select("chambres.id as chambre_id","chambres.*", "tarif_chambres.*", "type_chambres.*", "capacite_chambres.*")
                        ->where("chambres.id", "=", $request->chambre)
                        ->first()
                        ;

        // dd($chambre);
        return view("chambres.show", compact("chambre"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chambre $chambre)
    {
        $types = TypeChambre::all() ;
        $capacites = CapaciteChambre::all() ;
        $tarifs = TarifChambre::all() ;
        return view("chambres.edit", [
            "chambre" => $chambre,
            "tarifs" => $tarifs ,
            "capacites" => $capacites ,
            "types" => $types
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chambre $chambre)
    {
        $data = $request->validate([
            "numero_chambre" => "required",
            "nombre_adultes_enfants_chambre" => "required",
            "renfort_chambre" => "required",
            "etage_chambre" => "required",
            "nbr_lits_chambre" => "required",
            "image_chambre" => "image|mimes:png,jpg,jpeg,svg|max:2024",
            "tarif_chambre_id" => "required|exists:tarif_chambres,id",
            "type_chambre_id" => "required|exists:type_chambres,id",
            "capacite_chambre_id" => "required|exists:capacite_chambres,id",
        ]) ;

        if ($request->hasFile('image_chambre')) {
            $image = $request->file('image_chambre');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('chambres', $imageName, 'public');
    
            $data["image_chambre"] = $imagePath ;
        }

        $chambre->update($data);
        return redirect()->route('chambres.index')->with('success', 'Chambre modifier avec success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chambre $chambre)
    {
        if($chambre->reservations->count()){
            return redirect()->route('chambres.index')->with('error', 'Opération interdite : chambre déjà un objet de réservation.');
        }

        $chambre->delete() ;
        return redirect()->route('chambres.index')->with('success', 'Chambre supprimer avec success!');
    }
}

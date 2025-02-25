<?php

namespace App\Http\Controllers;

use App\Models\Capacite_chambre;
use App\Models\Chambre;
use App\Models\Tarif_chambre;
use App\Models\Type_chambre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chambres = Chambre::with( "type")->get();

        dump($chambres) ;
        // dd($chambres);

        // $chambres = DB::table('chambres')
        //     ->join('type_chambres', 'chambres.type_chambre_id', '=', 'type_chambres.id')
        //     ->join('capacite_chambres', 'chambres.capacite_chambre_id', '=', 'capacite_chambres.id')
        //     ->join('tarif_chambres', 'chambres.tarif_chambre_id', '=', 'tarif_chambres.id')
        //     ->select(["chambres.id as chambre_id", "chambres.*", "tarif_chambres.*", "capacite_chambres.*", "type_chambres.*"])
        //     ->get();

        // dd($chambres);

        // $types = Type_chambre::with("chambres")->get();
        // dd($types);



        return view("chambres.index", compact("chambres"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type_chambre::all() ;
        $capacites = Capacite_chambre::all() ;
        $tarifs = Tarif_chambre::all() ;


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
            "image_chambre" => "required|image|mimes:png,jpg,jpeg,svg|max:2024",
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
                        ->first();

        // dd($chambre);
        return view("chambres.show", compact("chambre"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chambre $chambre)
    {
        $types = Type_chambre::all() ;
        $capacites = Capacite_chambre::all() ;
        $tarifs = Tarif_chambre::all() ;
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
        $chambre->delete() ;
        return redirect()->route('chambres.index')->with('success', 'Chambre supprimer avec success!');
    }
}

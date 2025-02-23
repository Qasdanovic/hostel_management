<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
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
        // $chambres = Chambre::with([
        //     "type",
        //     "capacite",
        //     "tarif"
        // ])->get();

        $chambres = DB::table('chambres')
            ->join('type_chambres', 'chambres.type_chambre_id', '=', 'type_chambres.id')
            ->join('capacite_chambres', 'chambres.capacite_chambre_id', '=', 'capacite_chambres.id')
            ->join('tarif_chambres', 'chambres.tarif_chambre_id', '=', 'tarif_chambres.id')
            ->select()
            ->get();

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Chambre $chambre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chambre $chambre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chambre $chambre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chambre $chambre)
    {
        //
    }
}

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
    public function show(Capacite_chambre $capacite_chambre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Capacite_chambre $capacite_chambre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Capacite_chambre $capacite_chambre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Capacite_chambre $capacite_chambre)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Client;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Reservation::query();
        $chambres = Chambre::all();
        $clients = Client::all();

        if (request()->query("etat")) {
            $reservations = Reservation::where("Etat", "=", request("etat"))
                ->with([
                    "client",
                    "chambre"
                ])->get();
                
            return view("reservations.index", compact("reservations", "chambres", "clients"));
        }

        if(request("date_debut")){
            $query->where("Date_arrivee",">=", request("date_debut"));
        }

        if(request("date_fin")){
            $query->where("Date_depart","<=", request("date_fin"));
        }

        if(request("chambre_id")){
            $query->where("chambre_id", request("chambre_id"));
        }

        if(request("client_id")){
            $query->where("client_id", request("client_id"));
        }

        $reservations = $query->with(["client", "chambre"])->get();

        // $reservations = Reservation::with([
        //     "client",
        //     "chambre"
        // ])->get();

        return view("reservations.index", compact("reservations", "chambres", "clients"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("reservations.create");
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
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}

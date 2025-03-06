<?php

namespace App\Http\Controllers;

use App\Models\CapaciteChambre;
use App\Models\Chambre;
use App\Models\Client;
use App\Models\Reservation;
use App\Models\TarifChambre;
use App\Models\TypeChambre;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $types = TypeChambre::all()->count();
        $capacites = CapaciteChambre::all()->count();
        $tarifs = TarifChambre::all()->count();
        $chambres = Chambre::all()->count();
        $clients = Client::all()->count();
        $reservations = Reservation::all()->count();

        return view("dashboard", [
            'types' => $types,
            'capacites' => $capacites,
            "tarifs" => $tarifs,
            "chambres" => $chambres,
            "clients" => $clients,
            "reservations" => $reservations,
        ]);
    }

}

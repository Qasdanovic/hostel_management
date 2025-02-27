<?php

namespace App\Http\Controllers;

use App\Models\CapaciteChambre;
use App\Models\TypeChambre;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $types = TypeChambre::all()->count();
        $capacites = CapaciteChambre::all()->count();

        return view("dashboard", [
            'types' => $types,
            'capacites' => $capacites
        ]);
    }

}

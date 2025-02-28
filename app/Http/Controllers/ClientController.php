<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->all() && !$request->page){
            $query = Client::query();
            
            if($request->nom_complet){
                $query->where("nom_complet", $request->nom_complet);
            }
            if($request->ville){
                $query->where("ville", $request->ville);
            }
            if($request->pays){
                $query->where("pays", $request->pays);
            }
            // dd($query);

            $clients = $query->get();
            return view("clients.index", compact("clients"));
        }

        $clients = Client::simplePaginate(5);
        return view("clients.index", compact("clients"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("clients.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "nom_complet"=>"required",
            "sexe"=>"required",
            "date_naissance"=>"required",
            "age"=> "required",
            "pays"=>"required",
            "ville"=>"required",
            "adresse"=>"required",
            "email"=>["required", "unique:clients"],
            "telephone"=>"required"
        ]);

        Client::create($data);
        return redirect()->route("clients.index")->with("success", "nouvelle client ajoutee avec success");
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client){
    
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view("clients.edit", compact("client"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        return "update";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}

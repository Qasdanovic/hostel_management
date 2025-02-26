<?php

namespace App\Http\Controllers;

use App\Models\TypeChambre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = TypeChambre::all() ;
        return view("type_chambre.index", compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type_chambre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "type_chambre" => "required|min:5",
            "description" => "required|min:10"
        ]) ;

        TypeChambre::create($data);
        return redirect()->route('types.index')->with('success', 'new type added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $type = TypeChambre::with('chambres')
                            ->where("id", $request->type)
                            ->first();
        return view("type_chambre.show", compact("type"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $type = TypeChambre::findOrFail($request->type) ;
        return view('type_chambre.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeChambre $type_chambre)
    {
        $data = $request->validate([
            "type_chambre" => "required|min:5",
            "description" => "required|min:10"
        ]) ;

        $type = TypeChambre::findOrFail($request->type) ;

        $type->update($data);
        
        return redirect()->route('types.index')->with('success', 'type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, TypeChambre $type_chambre)
    {
        $check = DB::table("chambres")
                    ->where("type_chambre_id", "=", $request->type)
                    ->exists();

        $type = TypeChambre::findOrFail($request->type);

        if($check){
            return back()->with('error', 'Opération interdite : Type déjà lié à une chambre');
        };

        $type->delete();
        return back()->with('success', 'supprimer avec success');
    }
}

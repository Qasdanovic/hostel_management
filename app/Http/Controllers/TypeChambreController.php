<?php

namespace App\Http\Controllers;

use App\Models\Type_chambre;
use Illuminate\Http\Request;

class TypeChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type_chambre::all() ;
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

        Type_chambre::create($data);
        return redirect()->route('types.index')->with('success', 'new type added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type_chambre $type_chambre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $type = Type_chambre::findOrFail($request->type) ;
        return view('type_chambre.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type_chambre $type_chambre)
    {
        $data = $request->validate([
            "type_chambre" => "required|min:5",
            "description" => "required|min:10"
        ]) ;

        $type = Type_chambre::findOrFail($request->type) ;

        $type->update($data);
        
        return redirect()->route('types.index')->with('success', 'type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $type = Type_chambre::findOrFail($request->type);
        $type->delete();
        return back()->with('success', 'deleted successfully');
    }
}

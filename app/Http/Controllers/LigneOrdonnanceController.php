<?php

namespace App\Http\Controllers;

use App\Models\LigneOrdonnance;
use Illuminate\Http\Request;

class LigneOrdonnanceController extends Controller
{
    public function index()
    {
        $lignesOrdonnances = LigneOrdonnance::all();
        return response()->json($lignesOrdonnances);
    }

    public function show($id)
    {
        $ligneOrdonnance = LigneOrdonnance::findOrFail($id);
        return response()->json($ligneOrdonnance);
    }

    public function store(Request $request)
    {
        $ligneOrdonnance = LigneOrdonnance::create($request->all());
        return response()->json($ligneOrdonnance, 201);
    }

    public function update(Request $request, $id)
    {
        $ligneOrdonnance = LigneOrdonnance::findOrFail($id);
        $ligneOrdonnance->update($request->all());
        return response()->json($ligneOrdonnance, 200);
    }

    public function delete(Request $request, $id)
    {
        $ligneOrdonnance = LigneOrdonnance::findOrFail($id);
        $ligneOrdonnance->delete();
        return response()->json(null, 204);
    }
}

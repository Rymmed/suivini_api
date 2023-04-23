<?php

namespace App\Http\Controllers;

use App\Models\Ordonnance;
use Illuminate\Http\Request;

class OrdonnanceController extends Controller
{
    public function index()
    {
        $ordonnances = Ordonnance::all();
        return response()->json($ordonnances);
    }

    public function show($id)
    {
        $ordonnance = Ordonnance::findOrFail($id);
        return response()->json($ordonnance);
    }

    public function store(Request $request)
    {
        $ordonnance = Ordonnance::create($request->all());
        return response()->json($ordonnance, 201);
    }

    public function update(Request $request, $id)
    {
        $ordonnance = Ordonnance::findOrFail($id);
        $ordonnance->update($request->all());
        return response()->json($ordonnance, 200);
    }

    public function delete(Request $request, $id)
    {
        $ordonnance = Ordonnance::findOrFail($id);
        $ordonnance->delete();
        return response()->json(null, 204);
    }
}

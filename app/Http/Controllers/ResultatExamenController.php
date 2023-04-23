<?php

namespace App\Http\Controllers;

use App\Models\ResultatExamen;
use Illuminate\Http\Request;

class ResultatExamenController extends Controller
{
    public function index()
    {
        $resultatExamens = ResultatExamen::all();
        return response()->json($resultatExamens);
    }

    public function show($id)
    {
        $resultatExamen = ResultatExamen::findOrFail($id);
        return response()->json($resultatExamen);
    }

    public function store(Request $request)
    {
        $resultatExamen = ResultatExamen::create($request->all());
        return response()->json($resultatExamen, 201);
    }

    public function update(Request $request, $id)
    {
        $resultatExamen = ResultatExamen::findOrFail($id);
        $resultatExamen->update($request->all());
        return response()->json($resultatExamen, 200);
    }

    public function delete(Request $request, $id)
    {
        $resultatExamen = ResultatExamen::findOrFail($id);
        $resultatExamen->delete();
        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rappelprisemedicament;


class RappelprisemedicamentController extends Controller
{
    public function index()
    {
        $items = Rappelprisemedicament::all();
        return response()->json($items);
    }
    public function store(Request $request)
{
    $item = Rappelprisemedicament::create($request->all());
    return response()->json(['success' => true, 'rappelprisemedicament' => $item]);
}
public function show($id)
{
    $item = Rappelprisemedicament::find($id);
    return response()->json($item);
}
public function destroy($id)
    {
        $item = Rappelprisemedicament::findOrFail($id);
        $item->delete();
        return response()->json(null, 204);
    }
    public function update(Request $request, $id)
    {
        $item = Rappelprisemedicament::findOrFail($id);
        $item->update($request->all());
        return response()->json($item);
    }
}

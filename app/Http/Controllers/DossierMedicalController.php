<?php
namespace App\Http\Controllers;

use App\Models\DossierMedical;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class DossierMedicalController extends Controller
{
    public function index()
    {
        $dossierMedicals = DossierMedical::all();
        return response()->json($dossierMedicals);
    }

    public function show($id)
    {
        $dossierMedical = DossierMedical::findOrFail($id);
        return response()->json($dossierMedical);
    }

    public function store(Request $request)
    {
        $dossierMedical = DossierMedical::create($request->all());
        return response()->json($dossierMedical, 201);
    }

    public function update(Request $request, $id)
    {
        $dossierMedical = DossierMedical::findOrFail($id);
        $dossierMedical->update($request->all());
        return response()->json($dossierMedical, 200);
    }

    public function delete(Request $request, $id)
    {
        $dossierMedical = DossierMedical::findOrFail($id);
        $dossierMedical->delete();
        return response()->json(null, 204);
    }

    public function generateQrCode(Request $request, $dossierMedicalId)
    {
        // Obtenir le dossier médical correspondant à l'ID fourni
        $dossierMedical = DossierMedical::findOrFail($dossierMedicalId);

        if (!$dossierMedical) {
            return response()->json(['message' => 'Le dossier médical n\'existe pas.'], 404);
        }

        // Générer un code QR avec les informations de dossier médical
        $qrCode = QrCode::format('png')->size(250)->generate($dossierMedical->toJson());

        // Convertir le code QR en base64 pour l'afficher dans l'application React Native
        $base64Image = base64_encode($qrCode);

        return response()->json(['qrCode' => $base64Image]);
        }

}

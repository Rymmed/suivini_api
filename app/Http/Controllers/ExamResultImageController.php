<?php

namespace App\Http\Controllers;

use App\Models\ExamResultImage;
use App\Models\ResultatExamen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as Validator;

class ExamResultImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($exam_result_id)
    {
        $examResult = ResultatExamen::findOrFail($exam_result_id);

        $examResultImages = $examResult->images;

        return response()->json($examResultImages);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $exam_result_id)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|max:2048',
            'description' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $examResult = ResultatExamen::findOrFail($exam_result_id);

        // Sauvegarder l'image dans le système de fichiers ou le stockage cloud
        $image = $request->file('image');
        $image_path = $image->store('exam_result_images', 'public');

        $examResultImage = new ExamResultImage();
        $examResultImage->exam_result_id = $examResult->id;
        $examResultImage->image_path = $image_path;
        $examResultImage->description = $request->input('description');
        $examResultImage->save();

        return response()->json($examResultImage, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamResultImage $id)
    {
        $examResultImage = ExamResultImage::findOrFail($id);

        return response()->json($examResultImage);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $examResultImage = ExamResultImage::findOrFail($id);

        $examResultImage->description = $request->input('description');
        $examResultImage->save();

        return response()->json($examResultImage);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamResultImage $id)
    {
        $examResultImage = ExamResultImage::findOrFail($id);

        $examResultImage->delete();

        return response()->json(null, 204);
    }
}

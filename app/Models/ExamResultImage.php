<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResultImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_result_id',
        'description',
        'image_path',
    ];

    public function examResult()
    {
        return $this->belongsTo(ResultatExamen::class, 'exam_result_id');
    }
}

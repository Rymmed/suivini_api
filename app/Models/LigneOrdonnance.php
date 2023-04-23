<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneOrdonnance extends Model
{
    use HasFactory;

    protected $fillable = [
        'ordonnance_id',
        'medicament',
        'posologie',
    ];

    public function ordonnance()
    {
        return $this->belongsTo(Ordonnance::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierMedical extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'observations',
        'antecedents',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function ordonnances()
    {
        return $this->hasMany(Ordonnance::class);
    }

    public function medecins()
    {
        return $this->hasMany(User::class);
    }

    public function resultats_examens()
    {
        return $this->hasMany(ResultatExamen::class);
    }
}

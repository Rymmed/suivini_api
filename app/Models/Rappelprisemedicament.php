<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rappelprisemedicament extends Model
{
    public $timestamps = false;
    protected $fillable = ['id','date','heure','idligneordonnance'];
    use HasFactory;
}

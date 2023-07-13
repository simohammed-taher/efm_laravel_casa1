<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitant extends Model
{
    use HasFactory;
    protected $fillable = [
        'cin', 'nom', 'prenom', 'image'
    ];
    public function ville()
    {
        return $this->belongsTo(Ville::class, 'ville_id', 'id');
    }
}

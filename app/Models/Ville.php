<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    protected $fillable = [
        'ville', 'nombre_habitats'
    ];
    public function habitant()
    {
        return $this->hasMany(Habitant::class);
    }
}






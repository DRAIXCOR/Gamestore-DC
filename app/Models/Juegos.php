<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juegos extends Model
{
    use HasFactory;
   

    
    public function plataforma()
    {
        return $this->belongsTo(Plataforma::class, 'plataforma_id');
    }
}

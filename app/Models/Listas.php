<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listas extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function juegos()
    {
        return $this->hasMany(Juegos::class);
    }


}

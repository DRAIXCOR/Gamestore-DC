<?php

namespace App\Http\Controllers;
use App\Models\Plataforma;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function prin ($tipo = null) {
        return view('prin', compact('tipo'));
    }
}

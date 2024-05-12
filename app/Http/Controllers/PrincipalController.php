<?php

namespace App\Http\Controllers;
use App\Models\Plataforma;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class PrincipalController extends Controller
{
    public function prin ($tipo = null) {

        $user = Auth::user();
        return view('prin', compact('tipo'), ['user' => $user]);
    } 
}



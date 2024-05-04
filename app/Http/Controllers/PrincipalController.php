<?php

namespace App\Http\Controllers;
use App\Models\Plataforma;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class PrincipalController extends Controller
{
    public function prin ($tipo = null) {
       // $users = User::all();
        //return view('prin', compact('tipo'), ['users' => $users]);

        // Obtener el usuario autenticado actualmente
        $user = Auth::user();
        //return view('usuarios', ['user' => $user]);    
        return view('prin', compact('tipo'), ['user' => $user]);
    } 
}



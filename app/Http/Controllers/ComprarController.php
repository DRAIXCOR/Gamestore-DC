<?php

namespace App\Http\Controllers;
use App\Models\Plataforma;
use App\Models\User;
use App\Models\Listas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ComprarController extends Controller
{
    public function index () {

    
        $userId = Auth::id();      
        // Se obtienen los datos que cumplen la condición where
        $listas = Listas::where('user_id', $userId)->get();
        return view('comprar', ['listas' => $listas]);
    } 
    
}



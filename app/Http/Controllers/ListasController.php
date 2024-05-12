<?php

namespace App\Http\Controllers;

use App\Mail\CompraMailable;
use App\Mail\BienvenidoMailable;
use App\Models\Listas;
use App\Models\User;
use App\Models\Juegos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ListasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtenemos el id del usuario logeado
        $userId = Auth::id();      
        // Se obtienen los datos que cumplen la condición where
        $listas = Listas::where('user_id', $userId)->get();
        return view('listas.indexListas', compact('listas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Solo usuarios logeado pueden usar create
        $user = Auth::user(); 
        // Obtener todos los juegos
        $juegos = Juegos::all();
        return view('listas.createListas',  ['user' => $user, 'juegos' => $juegos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nombre_juego' => ['required', 'string', 'max:255'],
            'precio' => 'required',
           
        ]);
  
        $lista = new Listas();
        $lista->name = $request->name;
        $lista->user_id = $request->user_id;
        $lista->nombre_juego = $request->nombre_juego;
        $lista->precio = $request->precio;
        $lista->oferta = $request->oferta;
        $lista->disponible = $request->disponible;
        $lista->save();

        return redirect()->route('lista.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listas $lista)
    {
     
        return view('Listas.showListas', compact('lista'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listas $lista)
    {
        return view('Listas.editListas', compact('lista'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listas $lista)
    {
        $request->validate([
            'nombre_juego' => ['required', 'string', 'max:255'],
            'precio' => 'required',
          
        ]);
  
        $lista->nombre_juego = $request->nombre_juego;
        $lista->precio = $request->precio;
        $lista->oferta = $request->oferta;
        $lista->disponible = $request->disponible;
        $lista->save();

        return redirect()->route('lista.show', $lista);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listas $lista)
    {
        $lista->delete();
        return redirect()->route('lista.index');
    }


    /*public function comprar(Listas $lista)
    {
        Mail::to('ejemplo@ejemplo.com')->send(new CompraRealizada());
        return view('Listas.showListas', compact('lista'));
    }*/

    public function realizarCompra(Request $request)
    {
        // Obtener al usuario autenticado
        $user = Auth::user();
        $nombres = $request->input('nombres');
        $juegos = $request->input('juegos');
        $precios = $request->input('precios');
        $ofertas = $request->input('ofertas');
        $Total = $request->input('Total');

        // Envía el correo de bienvenida
        Mail::to($user->email)->send(new CompraMailable($nombres, $juegos, $precios, $ofertas, $Total));

        // Eliminar los registros de la tabla 'listas' con el campo 'name' igual a $nombres[0]
        Listas::where('name', $nombres[0])->delete();
        
        return redirect()->route('lista.create');
    }
}

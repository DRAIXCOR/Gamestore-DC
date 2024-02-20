<?php

namespace App\Http\Controllers;

use App\Models\Juegos;
use Illuminate\Http\Request;

class JuegosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $juegos = Juegos::all();
        return view('Juegos.indexJuegos', compact('juegos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Juegos.createJuegos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_juego' => ['required', 'string', 'max:255'],
            'genero' => 'required',
            'edad' => 'required',
            'plataforma' => 'required|array|min:1',
            'precio' => 'required',
            'desarrolladora' => ['required', 'string', 'max:255'],
            'release_year' => 'required',


        ]);
        
        $juego = new Juegos();
        $juego->nombre_juego = $request->nombre_juego;
        $juego->genero = $request->genero;
        $juego->edad = $request->edad;
        $juego->plataforma = implode(', ', $request->input('plataforma'));
        $juego->precio = $request->precio;
        $juego->desarrolladora = $request->desarrolladora;
        $juego->release_year = $request->release_year;
        $juego->save();

        return redirect()->route('juego.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Juegos $juego)
    {
        return view('juegos.showjuego', compact('juego'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Juegos $juego)
    {
        
        return view('Juegos.editJuegos', compact('juego'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Juegos $juego)
    {
        $request->validate([
            'nombre_juego' => ['required', 'string', 'max:255'],
            'genero' => 'required',
            'edad' => 'required',
            'plataforma' => 'required|array|min:1',
            'precio' => 'required',
            'desarrolladora' => ['required', 'string', 'max:255'],
            'release_year' => 'required',


        ]);
        
        $plataformas = implode(', ', $request->input('plataforma'));

        $juego->nombre_juego = $request->nombre_juego;
        $juego->genero = $request->genero;
        $juego->edad = $request->edad;
        $juego->plataforma= $plataformas;
        $juego->precio = $request->precio;
        $juego->desarrolladora = $request->desarrolladora;
        $juego->release_year= $request->release_year;
        $juego->save();

        return redirect()->route('juego.show', $juego);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Juegos $juego)
    {
        $juego->delete();
        return redirect()->route('juego.index');
    }
}

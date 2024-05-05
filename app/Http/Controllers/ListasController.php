<?php

namespace App\Http\Controllers;

use App\Models\Listas;
use Illuminate\Http\Request;

class ListasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listas = Listas::all();
        return view('listas.indexListas', compact('listas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('listas.createListas');
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
            'name' => ['required', 'string', 'max:255'],
            'nombre_juego' => ['required', 'string', 'max:255'],
            'precio' => 'required',
          
        ]);
        
        $lista->name = $request->name;
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
}

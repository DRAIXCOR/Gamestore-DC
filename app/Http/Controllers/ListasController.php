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
        return view('listas.indexLista', compact('listas'));
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
        
        $listas = new Listas();
        $listas->name = $request->name;
        $listas->nombre_juego = $request->nombre_juego;
        $listas->precio = $request->precio;
        $listas->oferta = $request->oferta;
        $listas->disponible = $request->disponible;
        $listas->save();

        return redirect()->route('lista.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listas $listas)
    {
        return view('Listas.showListas', compact('listas'));
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
    public function update(Request $request, Listas $listas)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nombre_juego' => ['required', 'string', 'max:255'],
            'precio' => 'required',
          
        ]);
        
        $listas->name = $request->name;
        $listas->nombre_juego = $request->nombre_juego;
        $listas->precio = $request->precio;
        $listas->oferta = $request->oferta;
        $listas->disponible = $request->disponible;
        $listas->save();

        return redirect()->route('listas.show', $listas);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listas $listas)
    {
        $listas->delete();
        return redirect()->route('listas.index');
    }
}

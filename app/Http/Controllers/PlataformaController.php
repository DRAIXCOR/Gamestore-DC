<?php

namespace App\Http\Controllers;

use App\Models\Plataforma;
use App\Models\Juegos;
use Illuminate\Http\Request;

class PlataformaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plataformas = Plataforma::all();
        return view('Plataformas.indexPlataforma', compact('plataformas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Plataformas.createPlataforma');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_plataforma' => ['required', 'string', 'max:255'],
            'tipo_plataforma' => ['required', 'string', 'max:255'],


        ]);
        $plataforma = new Plataforma();
        $plataforma -> nombre_plataforma = $request->nombre_plataforma;
        $plataforma -> tipo_plataforma = $request->tipo_plataforma;
        $plataforma->save();


        return redirect()->route('plataforma.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plataforma $plataforma)
    {
        return view('plataformas.showPlataforma', compact('plataforma'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plataforma $plataforma)
    {
        return view('Plataformas.editPlataforma', compact('plataforma'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plataforma $plataforma)
    {

        $request->validate([
            'nombre_plataforma' => ['required', 'string', 'max:255'],
            'tipo_plataforma' => ['required', 'string', 'max:255'],


        ]);

        $plataforma->nombre_plataforma = $request->nombre_plataforma;
        $plataforma->tipo_plataforma = $request->tipo_plataforma;
        $plataforma->save();

        return redirect()->route('plataforma.show', $plataforma);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plataforma $plataforma)
    {
        $plataforma->delete();
        return redirect()->route('plataforma.index');
    }

    public function catalogo(Plataforma $plataforma)
    {   
        //Se recupera el id actual de la plataforma
        $plataformaId = $plataforma->id;
        // Se obtienen los datos que cumplen la condición where
        $juego = Juegos::where('plataforma_id', $plataformaId)->get();
        return view('Plataformas.catalogo', compact('juego', 'plataforma'));
    }
}






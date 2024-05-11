<?php

namespace App\Http\Controllers;

use App\Models\Juegos;
use App\Models\Plataforma;
use App\Mail\BienvenidoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Mail;

class JuegosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $juegos = Juegos::with('plataforma')->get();
        return view('Juegos.indexJuegos', compact('juegos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $plataformas = Plataforma::all();
        return view('Juegos.createJuegos', ['plataformas' => $plataformas]);
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
            'imagen' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], 


        ]);

        $imagenOriginal = $request->file('imagen');

        // Generar un nombre de archivo único
        $nombreArchivo = pathinfo($imagenOriginal->getClientOriginalName(), PATHINFO_FILENAME) . '_' . uniqid() . '.' . $imagenOriginal->getClientOriginalExtension();

        // Reescalar la imagen
        $imagenReescalada = Image::make($imagenOriginal)->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        //Guardado extraño pero funcional en el almacenamiento local
        $imagenReescalada->save(public_path('imagenes/' . $nombreArchivo));
        $rutaImagen = 'imagenes/' . $nombreArchivo;

        $juego = new Juegos();
        $juego->nombre_juego = $request->nombre_juego;
        $juego->genero = $request->genero;
        $juego->edad = $request->edad;
        $juego->plataforma = implode(', ', $request->input('plataforma'));
        $juego->precio = $request->precio;
        $juego->desarrolladora = $request->desarrolladora;
        $juego->release_year = $request->release_year;
        $juego->imagen = $rutaImagen; // Obtener la URL pública de la imagen
        $juego->plataforma_id = $request->plataforma_id;

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
        $plataformas = Plataforma::all();
        return view('Juegos.editJuegos', compact('juego', 'plataformas'));
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
            'imagen' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],


        ]);
        
        $plataformas = implode(', ', $request->input('plataforma'));

        $juego->nombre_juego = $request->nombre_juego;
        $juego->genero = $request->genero;
        $juego->edad = $request->edad;
        $juego->plataforma = implode(', ', $request->input('plataforma'));
        $juego->precio = $request->precio;
        $juego->desarrolladora = $request->desarrolladora;
        $juego->release_year= $request->release_year;
        if ($request->hasFile('imagen')) {
            $imagenOriginal = $request->file('imagen');
            $nombreArchivo = pathinfo($imagenOriginal->getClientOriginalName(), PATHINFO_FILENAME) . '_' . uniqid() . '.' . $imagenOriginal->getClientOriginalExtension();
            $imagenReescalada = Image::make($imagenOriginal)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $rutaImagen = 'imagenes/' . $nombreArchivo;
            $imagenReescalada->save(public_path('imagenes/' . $nombreArchivo));
            $juego->imagen = $rutaImagen;
        }
        $juego->plataforma_id = $request->plataforma_id;
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
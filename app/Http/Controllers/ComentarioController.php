<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = request()->input('id');
        $comentario = new Comentario();
        $comentario->incidencia_id = $id;
        return view('comentarios.edit',['comentario'=>$comentario]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incidencia_id = $request->input('id');
        $request->validate([
            'text' => 'required|string',
            'time' => 'required|integer',
        ]);

        $comentario = new Comentario();
        $comentario->text = $request->input('text');
        $comentario->incidencia_id = $incidencia_id;
        $comentario->time = $request->input('time');
        $comentario->user_id = auth()->user()->id;
        $comentario->save();

        // Redirige a la vista de incidencia
        return redirect()->route('incidencias.show', ['incidencia' => $incidencia_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        if(auth()->user()->id!= $comentario->user_id){
            return redirect()->route('incidencias.show', ['incidencia' => $comentario->incidencia->id]);
        }
        return view('comentarios.edit',['comentario'=>$comentario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {

        $request->validate([
            'text' => 'required|string',
            'time' => 'required|integer',
        ]);
        $comentario->text = $request->input('text');
        $comentario->time = $request->input('time');
        $comentario->save();
        return redirect()->route('incidencias.show', ['incidencia' => $comentario->incidencia->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        $comentario->delete();
        return redirect()->route('incidencias.show', ['incidencia' => $comentario->incidencia->id]);
    }
}

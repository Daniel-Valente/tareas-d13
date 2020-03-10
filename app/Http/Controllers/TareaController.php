<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tareas = Tarea::all();

        return view('tareas.tareaIndex', compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all()->pluck('nombre_Categoria', 'id');
        return view('tareas.tareaForm', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_Tarea' => 'required|max:255',
            'fecha_Inicio' => 'required|date',
            'fecha_Fin' => 'required|date',
            'descripcion' => 'required',
            'prioridad' => 'required|int|min:1|max:255',
        ]);

        $request->merge(['user_id' => \Auth::id()]);
        //dd($request->all());
        Tarea::create($request->all());

        /*$tarea = new Tarea();
        $tarea->user_id = \Auth::id();
        $tarea->categoria_id = $request->categoria_id;
        $tarea->nombre_Tarea = $request->nombre_Tarea;
        $tarea->fecha_Inicio = $request->fecha_Inicio;
        $tarea->fecha_Fin = $request->fecha_Fin;
        $tarea->descripcion = $request->descripcion;
        $tarea->prioridad = $request->prioridad;
        $tarea->save();*/

        return redirect()->route('tarea.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $tarea)
    {
        return view('tareas.tareaShow', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarea $tarea)
    {
        $categorias = Categoria::all()->pluck('nombre_Categoria', 'id');
        return view('tareas.tareaForm', compact('tarea', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        $request->validate([
            'nombre_Tarea' => 'required|max:255',
            'fecha_Inicio' => 'required|date',
            'fecha_Fin' => 'required|date',
            'descripcion' => 'required',
            'prioridad' => 'required|int|min:1|max:3',
        ]);

        Tarea::where('id', $tarea->id)
            ->update($request->except('_token', '_method'));

        /*$tarea->categoria_id = $request->categoria_id;
        $tarea->nombre_Tarea = $request->nombre_Tarea;
        $tarea->fecha_Inicio = $request->fecha_Inicio;
        $tarea->fecha_Fin = $request->fecha_Fin;
        $tarea->descripcion = $request->descripcion;
        $tarea->prioridad = $request->prioridad;
        $tarea->save();*/

        return redirect()->route('tarea.show', $tarea->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('tarea.index');
    }
}

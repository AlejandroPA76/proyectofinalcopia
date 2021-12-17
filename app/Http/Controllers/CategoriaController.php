<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Categoria::get();
        return view('supervisor.crudCategoria',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supervisor.agregarCat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newcat = new Categoria;
        $newcat->nombre = $request->input('nombre');
        $newcat->descripcion = $request->input('descripcion');
        $newcat->imagen = $request->input('imagen');
        $newcat->activa = $request->input('activa');
        $newcat->save();
        return redirect('categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rCat = Categoria::find($id);
        return view('supervisor.editarCat',compact('rCat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $upcat=Categoria::find($id);
        $upcat->nombre = $request->input('nombre');
        $upcat->descripcion = $request->input('descripcion');
        $upcat->imagen = $request->input('imagen');
        $upcat->activa = $request->input('activa');
        $upcat->save();

        return redirect('categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delcat=Categoria::find($id);
        $delcat->delete();
        return redirect('categorias');
    }
}

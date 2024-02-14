<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncidenciasRequest;
use App\Http\Requests\UpdateIncidenciasRequest;
use App\Jobs\Informacion;
use App\Models\Incidencias;
use PhpParser\Node\Expr\Include_;

class IncidenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidencias=Incidencias::all();

        //Lanzo el job sincronicamente
        //Informacion::dispatch(Incidencias::all());
        //Lanzo el job despues de la respuesta:
        Informacion::dispatchAfterResponse( Incidencias::all());

        //Lanzo el job asincronicamente, a travez de la base de datos
        Informacion::dispatchAfterResponse( Incidencias::all())->onConnection('database');

        //En una segundo cola:
        Informacion::dispatchAfterResponse( Incidencias::all())->onQueue('secondary');

        return view('index', ["incidencias"=>$incidencias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncidenciasRequest $request)
    {
        $incidencia = Incidencias::create($request->all());
        return redirect()->route('incidencias.show',['id'=>$incidencia->id])->with('message','Guardado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $incidencia = Incidencias::find($id);
        return view('show',["incidencia"=>$incidencia]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $incidencia= Incidencias::find($id);
        return view('edit',["incidencia"=>$incidencia]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncidenciasRequest $request)
    {
        $incidencia = Incidencias::find($request->id);
        $incidencia->update($request->all());
        return redirect()->route('incidencias.index')->with("message","Actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $incidencia = Incidencias::find($id);
        $incidencia->delete($id);
        return redirect()->route('incidencias.index')->with("message","borrado exitosamente");
    }
}

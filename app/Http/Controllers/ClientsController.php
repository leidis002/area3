<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Client;
use App\Persona;
use Laracasts\Flash\Flash;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('created_at', 'DESC')->get();

        return view('admin.votantes.index')->with('clients', $clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $persona = new Persona();
        $cliente = new Client();

        $persona->fill($request->all());
        $persona->save();

        $cliente->fill($request->all());
        $cliente->persona()->associate($persona);
        $cliente->save();

        Flash::success('Votante Registrado con Exito');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $votante = Persona::find($id);

        return view('admin.votantes.show')->with('votante', $votante);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $votante = Persona::find($id);
        $ciudades = Ciudad::orderBy('id', 'ASC')->get();

        return view('admin.votantes.edit')
            ->with('votante', $votante)
            ->with('ciudades', $ciudades);
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
        
        $persona = Persona::find($id);

        $persona->update($request->all());

        if ($request->mesa_id != null) {
            $persona->mesa()->associate($request->mesa_id);
        }

        $persona->save();

        Flash::success('Votante Edito con Exito');
        return redirect()->route('votantes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $votante = Persona::find($id);

        $votante->delete();

        Flash::success('Votante Eliminado con Exito');
        return redirect()->route('votantes.index');
    }

    /*
    * Este metodo devuelve un objeto con los datos del votante si exite
    */

    public function verificar(Request $request)
    {
        $votante = Persona::where('cedula', $request->cedula)->first();
        
        if ($votante != null) {
            flash()->overlay($votante, 'Datos del votante:');
            return redirect()->back();
        } else {
            Flash::error('El votante no se encuentra la base de datos');
            return redirect()->back();
        }
    }
}

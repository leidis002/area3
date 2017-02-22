<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Persona;
use Laracasts\Flash\Flash;

class usersController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = new Persona();
        $usuario = new User();

        $persona->fill($request->all());
        $persona->save();

        $usuario->fill($request->all());
        $usuario->type = 'develop';
        $usuario->persona()->associate($persona);
        $usuario->save();

        Flash::success('Usuario Registrado con Exito');
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
        $usuario = User::find($id);

        return view('admin.usuarios.show')->with('usuario', $usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        $personas = Persona::orderBy('id', 'ASC')->get();

        return view('admin.usuarios.edit')
            ->with('usuario', $usuario)
            ->with('personas', $personas);
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
        $usuario = User::find($id);

        $usuario->fill($request->all());
        $usuario->persona()->associate($request->persona_id);

        $usuario->save();

        Flash::success('Usuario Ediatado con Exito');
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);

        $usuario->delete();

        Flash::success('Usuario Eliminado con Exito');
        return redirect()->route('usuarios.index');
    }
}

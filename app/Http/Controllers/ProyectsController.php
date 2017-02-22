<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Proyect;
use App\User;
use App\Client;
use Laracasts\Flash\Flash;

class ProyectsController extends Controller
{
    public function index()
    {
        $proyects = Proyect::orderBy('created_at', 'DESC')->get();
        $users = User::orderBy('id', 'DESC')->lists('name', 'id');
        $clients = Client::orderBy('id', 'DESC')->lists('contact', 'id');

        return view('admin.proyectos.index')
            ->with('proyects', $proyects)
            ->with('users', $users)
            ->with('clients', $clients);
    }

    public function store(Request $request)
    {
        $proyect = new Proyect();

        $proyect->fill($request->all());
        $proyect->status = 'planning';
        $proyect->save();

        Flash::succes('Proyecto registrado con exito');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Proyect;
use App\Client;
use App\Persona;
use App\User;

class estadisticasController extends Controller
{
    public function proyectos()
    {
    	$proyects = Proyect::orderBy('id', 'ASC')->get();

    	return view('admin.pdf.proyectos')->with('proyects', $proyects);
    }

    public function programadores()
    {
    	$users = User::orderBy('id', 'ASC')->get();

        return view('admin.pdf.users')->with('users', $users);
    }

    public function clientes()
    {
        $clients = Client::orderBy('id', 'ASC')->get();

        return view('admin.pdf.clientes')->with('clients', $clients);
    }
}

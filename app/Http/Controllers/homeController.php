<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Laracasts\Flash\Flash;

class homeController extends Controller
{
    public function home()
    {
    	$usuarios = User::orderBy('id', 'ASC')->get();
   
        return view('home')->with('usuarios', $usuarios);
    }
}

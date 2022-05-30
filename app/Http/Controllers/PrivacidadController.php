<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PrivacidadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {

        $usuario = User::all();


    return view('modulos.privacidad')->with('usuario', $usuario);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Parametro;
use Illuminate\Http\Request;

class ParametroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        if(auth()->user()->rol != 'ADMINISTRATIVO'){
            return redirect('inicio');
        }
        $servicios = Parametro::all();
        return view('modulos.parametro.parametro') ->with('servicios' ,$servicios) ;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request();

       Parametro::create([

        'nombre_servicio'=>$datos['nombre_servicio'],
       ]);
      return redirect('parametros');
    }


    public function show(Parametro $parametro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function edit(Parametro $parametro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parametro $parametro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parametro $parametro)
    {
        //
    }
}

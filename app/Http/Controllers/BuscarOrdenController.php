<?php

namespace App\Http\Controllers;

use App\Models\BuscarOrden;
use Illuminate\Http\Request;
use App\Models\OrdenServicio;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class BuscarOrdenController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecnico  = User::where('rol','Tecnico')
        ->orWhere('rol', 'Coordinador Técnico')->get();
        $ordenServicio = DB::table('orden_servicio as orden')
        ->join('cliente', 'orden.id_cliente_orden', '=', 'cliente.cliente_id')
        ->join('equipo', 'orden.id_equipo_orden', '=', 'equipo.equipo_id')
        ->join('users', 'users.id', '=', 'orden.id_tecnico_orden')
        ->select('cliente.*', 'equipo.*','users.name', 'orden.*' )->orderByDesc('orden.id_orden')
        ->get()->toArray();


         return view('modulos.ordenServicio.orden_general')->with('ordenServicio',  $ordenServicio)
         ->with('tecnico',  $tecnico);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BuscarOrden  $buscarOrden
     * @return \Illuminate\Http\Response
     */
    public function show(BuscarOrden $buscarOrden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BuscarOrden  $buscarOrden
     * @return \Illuminate\Http\Response
     */
    public function edit(BuscarOrden $buscarOrden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BuscarOrden  $buscarOrden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BuscarOrden $buscarOrden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BuscarOrden  $buscarOrden
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuscarOrden $buscarOrden)
    {
        //
    }
}

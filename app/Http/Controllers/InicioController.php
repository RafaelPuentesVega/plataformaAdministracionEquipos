<?php

namespace App\Http\Controllers;

use App\Models\inicio;
use Illuminate\Http\Request;
use App\Models\OrdenServicio;
use App\Models\Clientes;
use Illuminate\Support\Facades\DB;
use App\Models\NotificacionesEmail;
use App\Models\User;

class InicioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {

    if(Auth()->user()->rol == 'ADMINISTRATIVO' || Auth()->user()->rol == 'GERENTE' ){

        $ordenServicio = OrdenServicio:://DB::table('orden_servicio as orden')
        whereNull('fecha_entrega_orden' )->where('estadoOrden','1')->get()->toArray();

            $control = sizeof($ordenServicio);
            $fechaActual = date('Y-m-d H:i');
            $vencidas[] = null;
            $vigentes[] = null ;
            for ($i = 0; $i < $control; $i++) {

            $fechaEstimada = $ordenServicio[$i]['fecha_estimada_orden'];

            if($fechaActual >  $fechaEstimada){
                $vencidas[] = $ordenServicio[$i];
            }
            if($fechaActual <=  $fechaEstimada){
                $vigentes[] = $ordenServicio[$i];
            }

            }
    $tamañoVencidas = count($vencidas)-1;
    $tamañovigentes = count($vigentes) -1;
    $añoActual = date('Y');
    $cantidadOrdenMes = OrdenServicio::
    whereYear('fecha_creacion_orden', $añoActual)
    ->select(DB::raw(' MONTH(fecha_creacion_orden) as mes,count(*) as cantidad'))
    ->groupBy('mes')
    ->get()->toArray();

    $cantOrdenes = OrdenServicio::
    get()->count();

    $Pendientes = OrdenServicio::
    where('estadoOrden', 2)
    ->get()->count();

    $PendienteFacturar = OrdenServicio::
    where('estadoOrden', 3)
    ->whereNull('factura_numero_orden')
    ->get()->count();
    $entregadasOrden = OrdenServicio::
    where('estadoOrden', 3)
    ->get()->count();
    $porcentaje = round(($PendienteFacturar * 100)/$entregadasOrden);

    $priceOrdenes = OrdenServicio::
    select(DB::raw('sum(valor_total_orden) as total'))
    ->get()->toArray();
    $priceOrdenes = $priceOrdenes[0];


    $enero = 0;
    $febrero = 0;
    $marzo = 0;
    $abril = 0;
    $mayo = 0;
    $junio = 0;
    $julio = 0;
    $agosto = 0;
    $septiembre = 0;
    $octubre = 0;
    $noviembre = 0;
    $diciembre = 0;

    for($y=0 ; $y < count($cantidadOrdenMes); $y++){
        switch($cantidadOrdenMes[$y]['mes']){

            case 1:
                $enero = intval($cantidadOrdenMes[$y]['cantidad']);
                break;
            case 2:
                $febrero = intval($cantidadOrdenMes[$y]['cantidad']);
                break;
            case 3:
                $marzo = intval($cantidadOrdenMes[$y]['cantidad']);
                break;
            case 4:
                $abril = intval($cantidadOrdenMes[$y]['cantidad']);
                break;
            case 5:
                $mayo = intval($cantidadOrdenMes[$y]['cantidad']);
                break;
            case 6:
                $junio = intval($cantidadOrdenMes[$y]['cantidad']);
                break;
            case 7:
                $julio = intval($cantidadOrdenMes[$y]['cantidad']);
                break;
            case 8:
                $agosto = intval($cantidadOrdenMes[$y]['cantidad']);
                break;
            case 9:
                $septiembre = intval($cantidadOrdenMes[$y]['cantidad']);
                break;
            case 10:
                $octubre = intval($cantidadOrdenMes[$y]['cantidad']);
                break;
            case 11:
                $noviembre = intval($cantidadOrdenMes[$y]['cantidad']);
                break;
            case 12:
                $diciembre = intval($cantidadOrdenMes[$y]['cantidad']);
                break;
            default:
                break;
        }
    }
            return view('modulos.inicio.inicio-administrativo')
            ->with('enero' ,$enero)
            ->with('febrero' ,$febrero)
            ->with('marzo' ,$marzo)
            ->with('abril' ,$abril)
            ->with('mayo' ,$mayo)
            ->with('junio' ,$junio)
            ->with('julio' ,$julio)
            ->with('agosto' ,$agosto)
            ->with('septiembre' ,$septiembre)
            ->with('octubre' ,$octubre)
            ->with('noviembre' ,$noviembre)
            ->with('diciembre' ,$diciembre)
            ->with('añoActual' ,$añoActual)
            ->with('cantOrdenes' , $cantOrdenes)
            ->with('priceOrdenes' , $priceOrdenes)
            ->with('PendienteFacturar' , $PendienteFacturar)
            ->with('porcentaje' , $porcentaje)
            ->with('Pendientes' ,$Pendientes)
            ->with('ordenesReparacion' ,$control)
            ->with('tamañoVencidas' ,$tamañoVencidas)
            ->with('tamañovigentes' ,$tamañovigentes);
        }else{
            $idUsuario = auth()->id();


            $ordenServicio = OrdenServicio:://DB::table('orden_servicio as orden')
            join('cliente', 'id_cliente_orden', '=', 'cliente.cliente_id')
            ->join('equipo', 'id_equipo_orden', '=', 'equipo.equipo_id')
            ->whereNull('fecha_entrega_orden' )->where('id_tecnico_orden',$idUsuario)->where('estadoOrden','1')->get()->toArray();

            $ordenServicioListas = OrdenServicio::
            whereNull('fecha_entrega_orden' )->where('id_tecnico_orden',$idUsuario)->where('estadoOrden','2')->get()->toArray();

                $control = sizeof($ordenServicio) - 1;
                $fechaActual = date('Y-m-d H:i');
                $vencidas[] = null;
                $vigentes[] = null ;
                for ($i = 0; $i <= $control; $i++) {

                $fechaEstimada = $ordenServicio[$i]['fecha_estimada_orden'];

                if($fechaActual >  $fechaEstimada){
                    $vencidas[] = $ordenServicio[$i];
                }
                if($fechaActual <=  $fechaEstimada){
                    $vigentes[] = $ordenServicio[$i];
                }


                }
                $tamañoListas =    sizeof($ordenServicioListas);
                $tamañoVencidas = count($vencidas)-1;
                $tamañovigentes = count($vigentes) -1 ;
              //CONSULTA PARA TRAER LOS TECNICOS A VISTA DE ADMINISTRADORES
               $user = User::where('rol','Tecnico')
               ->orWhere('rol', 'Coordinador Técnico')->get();


            return view('modulos.inicio.inicio-tecnicos')
            ->with('vigentes' ,$vigentes)
            ->with('vencidas' ,$vencidas)->with('user' ,$user)
            ->with('tamañoVencidas' ,$tamañoVencidas)
            ->with('tamañovigentes' ,$tamañovigentes)
            ->with('tamañoListas' ,$tamañoListas) ;
        }

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
     * @param  \App\Models\inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function show(inicio $inicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function edit(inicio $inicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inicio $inicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(inicio $inicio)
    {
        //
    }
}

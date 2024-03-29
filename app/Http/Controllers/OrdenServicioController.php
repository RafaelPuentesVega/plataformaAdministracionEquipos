<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Models\OrdenServicio;
use App\Models\Parametro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Clientes;
use App\Models\Departamentos;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\ParametrosDetalle;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Auth;
//use Mail;
//use EmailPdf;
use App\Mail\EmailPdf as MailEmailPdf;
use App\Models\TipoEquipo;

//use Illuminate\Mail\Mailable;







class OrdenServicioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {

        //$ordenServicio = OrdenServicio::all();//consultorios es igual a orden de servicio
        $ordenServicio = OrdenServicio:://DB::table('orden_servicio as orden')
        whereNull('fecha_entrega_orden' )
        ->where('estadoOrden','1')
        ->groupBy('id_tecnico_orden')
        ->select(DB::raw(' id_tecnico_orden as tecnico,count(*) as cantidad'))
        ->get()->toArray();
        $user = User::where('rol','Tecnico')
        ->orWhere('rol', 'Coordinador Técnico')->get();
        $servicios = Parametro::all();
        $clientes = Clientes::all();
        $departamentos = Departamentos::all();
        $tipoEquipo = TipoEquipo::all();


        return view('modulos.ordenServicio.crearordenservicio')
        ->with('user',$user)
        ->with('servicios',$servicios)
        ->with('ordenServicio',$ordenServicio)
        ->with('departamentos',$departamentos)
        ->with('clientes' ,$clientes)
        ->with('tipoEquipo',$tipoEquipo);
    }



    public function consultarTecnico(Request $request)
    {
        $response = array('message' => 'Consultado Correctamente' , 'state' => 'ok', 'data' => null);
        try {
            $ordenServicio =  OrdenServicio::where('id_orden',$request->idOrden)->first();
            $tecnicoOrden = $ordenServicio->id_tecnico_orden;
            $tecnico = User::where('rol','Tecnico')->where('id','!=' ,$tecnicoOrden)->select('id','name')->get()->toArray();
            $response['data'] = $tecnico;
        } catch (\Throwable $e) {
            $response['data'] = [];
            $response['message'] = 'Ocurrio un error';
            $response['state'] = 'error';
        }
        return json_encode($response);

    }
    public function updateTecnico(Request $request)
    {
        $response = array('message' => 'Actualizado Correctamente' , 'state' => 'ok');
        try {
            DB::table('orden_servicio')
            ->where('id_orden', $request->idOrden)
            ->update( [
                'id_tecnico_orden' => $request->idtecnicoNuevo ] );
        } catch (\Throwable $e) {
            $response['message'] = 'Ocurrio un error';
            $response['state'] = 'error';
        }
        return json_encode($response);

    }
    public function guardarNumeroFactura(Request $request)
    {
       $idOrden =  $request->numeroOrden;

        DB::table('orden_servicio')
        ->where('id_orden', $idOrden)
        ->update(
            [
            'factura_numero_orden' => $request->numeroFactura,
            ]
            );


        $response = Array('mensaje' =>'update');

        return json_encode($response);

    }
    public function facturaNumero(Request $request)
    {
        $facturaArray = DB::table('orden_servicio as orden')
        //->join('repuesto', 'repuesto.id_orden_servicio_repuesto', '=', 'orden.id_orden'  )
        ->join('cliente', 'orden.id_cliente_orden', '=', 'cliente.cliente_id')
        ->join('equipo', 'orden.id_equipo_orden', '=', 'equipo.equipo_id')
        ->select('cliente.*', 'equipo.*', 'orden.*' )
        ->whereRaw("orden.id_orden = $request->id")
        ->get()->toArray();
        //CONSULTO LOS REPUESTOS RELACIONADORES A LA ORDEN
        $repuestoFacturaArray = DB::table('repuesto as repuesto')
        ->join('orden_servicio as orden', 'repuesto.id_orden_servicio_repuesto', '=', 'orden.id_orden')
        ->select( 'repuesto.*')
        ->whereRaw("orden.id_orden = $request->id")
        ->get()->toArray();

       // dd($repuestoFacturaArray);

        $response = Array('mensaje' =>'ok');
        $response['dataFactura'] =$facturaArray;//Devolvemos a la vista el array del repuesto recien registrado
        $response['dataRepuestoFactura'] =$repuestoFacturaArray;
       // $response = Array('mensaje' => 'ok'   );
       // $response['dataOrden'] =$ordenServicio->toArray();//Devolvemos a la vista el array del cliente recien registrado
        return json_encode($response);

    }

    public function show(OrdenServicio $OrdenServicio)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\consultorios  $consultorios
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdenServicio $OrdenServicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\consultorios  $consultorios
     * @return \Illuminate\Http\Response
     */
    public function termirnarOrden(Request $request)
    {
        $valorTotalRepuesto = $request->valorTotalRepuesto;
        $valorservicio = $request->valorservicio;
        $idOrden = $request->idOrden;
        $fechaActual = new \DateTime();
        $estadOrden = 2 ; ///Estado (2 - REPARADO)


        if($request->iva == 'SI' ){
            $iva = $valorservicio * 0.19;
            $iva =  intval($iva * 1) / 1;//Dejamos sin decimales el IVA - Luego rendodeamos en el valor total
        }else{
            $iva = 0;
        }
        $valorTotalOrden =  intval($valorTotalRepuesto + $valorservicio + $iva);
        DB::table('orden_servicio')
            ->where('id_orden', $idOrden)
            ->update(
                [
                'fecha_reparacion_orden' => $fechaActual,
                'reporte_tecnico_orden' =>  $request->reporteTecnico,
                'estadoOrden' =>  $estadOrden,
                'valor_servicio_orden' =>  $valorservicio,
                'iva_orden' =>  $iva,
                'valor_repuestos_orden' => $valorTotalRepuesto,
                'valor_total_orden' => $valorTotalOrden,

                ]
                );

                $response = Array('mensaje' => 'save'   );
                return json_encode($response);

    }
    public function editarOden($id_cliente)
    {
        try{
        $id_cliente =  decrypt($id_cliente) ;

        $dataCliente = DB::table('orden_servicio')
        ->where('id_orden', '=', $id_cliente)->get()->toArray();

        //Consulta para traer el diagnostico de la orden
        $diagnostico = DB::table('observacion')
        ->where('id_ordenServicio', '=', $id_cliente)->where('tipo_observacion', '=', 1)->get()->first();
        $Arraydiagnostico = '';//Dejamos en array en 0
        if($diagnostico){
            $Arraydiagnostico = $diagnostico;
        }
        if($diagnostico != null){
            $diagnostico = 1;//Si Tiene diagnostico
        }
        //Consulta para traer los repuestos de la orden
        $repuesto = DB::table('repuesto')
        ->where('id_orden_servicio_repuesto', '=', $id_cliente)->get()->toArray();
        $pendAutRep = 0;
        //Contamos los repuestos pendientes de autorizar
        foreach ($repuesto as $key => $value) {
            if ($value->estado_repuesto == 1) {
                $pendAutRep = $pendAutRep +1;
            }
        }
        //Realizamos el conteo del valor total de los repuestos
        $totalValorRepuestos = 0;//Iniciliazamos la variable en 0
        $control = sizeOf($repuesto) ;
        for($i = 0 ; $i < $control ; $i++ ){
        $totalValorRepuestos = $totalValorRepuestos + $repuesto[$i]->valor_total_repuesto;
        }
        //Consulta para traer los comentarios a la vista
        $anotacion = DB::table('observacion')
        ->where('id_ordenServicio', '=', $id_cliente) ->whereIn('tipo_observacion', [2, 3])->get()->toArray();
       ///Validamos si colocan en la URL un ID no valido
        if(sizeof($dataCliente) == 0){
            throw new \Throwable();
        }

            $Data = DB::table('orden_servicio as orden')
            ->join('cliente', 'orden.id_cliente_orden', '=', 'cliente.cliente_id')
            ->join('equipo', 'orden.id_equipo_orden', '=', 'equipo.equipo_id')
            ->leftjoin('departamentos', 'cliente.departamento_id', '=', 'departamentos.departamento_id')
            ->leftjoin('municipios', 'cliente.municipio_id', '=', 'municipios.municipio_id')
            ->leftjoin('usuario_empresa', 'orden.id_cliente_usuario_orden', '=', 'usuario_empresa.id_cliente_empresa')
            ->join('users', 'orden.id_tecnico_orden', '=', 'users.id')
            ->select('cliente.*', 'equipo.*', 'orden.*', 'departamentos.departamento_nombre','municipios.municipio_nombre','usuario_empresa.*','users.name' )
            ->whereRaw("orden.id_orden = $id_cliente")
            ->get()->toArray();
            $arrayData = $Data[0];
        } catch (\Throwable $e) {
            return view('errors.404');

        }
        // dd($pendAutRep);
        return view('modulos.ordenServicio.editarordeservicio')->with('arrayData',$arrayData)
        ->with('diagnostico',$diagnostico)->with('Arraydiagnostico',$Arraydiagnostico)
        ->with('anotacion',$anotacion)->with('pendAutRep',$pendAutRep)->with('repuesto',$repuesto)->with('totalValorRepuestos',$totalValorRepuestos);

    }

    public function entregarOrden(Request $request)
    {
        $idOrden = $request->idOrden;
        $estadoOrden = 3 ; // Colocamos estado 3 (1-Recien ingresa - 2-Terminada , 3-Entregada)
        $fechaActual = new \DateTime();
        $enviarEmail = $request->enviarEmail;
        $userCreated =  Auth()->user()->name;

        $arrayOrden  = DB::table('orden_servicio')
        ->where('id_orden', '=', $idOrden)->get();
       // dd($arrayOrden[0]->iva_orden);
        if($request->sinIva == 'SI'){
            $valorTotal = $arrayOrden[0]->valor_total_orden;
            $ivaOrden = $arrayOrden[0]->iva_orden;
            $valorTotalNew = $valorTotal - $ivaOrden;
            //ACTUALIZAMOS EN LA BD CUANDO EL USUARIO ESCOGE "SIN IVA"
            DB::table('orden_servicio')
            ->where('id_orden', $idOrden)
            ->update( [
                'iva_orden' => 0 ,//COLOCAMOS EL IVA EN 0
                'valor_total_orden' => $valorTotalNew ,
                'user_entrega' =>$userCreated ] );
        }
        DB::table('orden_servicio')
        ->where('id_orden', $idOrden)
        ->update( [
            'estadoOrden' => $estadoOrden ,
            'fecha_entrega_orden' => $fechaActual,
            'user_entrega' =>$userCreated ] );

            $response = Array('mensaje' => 'ok'   );
            $pdfOrden =  OrdenServicioController::ordenSalidaPdf( $enviarEmail ,$idOrden);
            return json_encode($response);
    }
    public function ordenGeneral($id_cliente)
    {
        try{
        $id_cliente = decrypt($id_cliente);
        $dataCliente = DB::table('orden_servicio')
        ->where('id_orden', '=', $id_cliente)->get()->toArray();

        //Consulta para traer el diagnostico de la orden
        $diagnostico = DB::table('observacion')
        ->where('id_ordenServicio', '=', $id_cliente)->where('tipo_observacion', '=', 1)->get()->toArray();
        $Arraydiagnostico = '';//Dejamos en array en 0
        if(sizeOf( $diagnostico) > 0){
            $Arraydiagnostico = $diagnostico[0];
        }
        //Consulta para traer los repuestos de la orden
        $repuesto = DB::table('repuesto')
        ->where('id_orden_servicio_repuesto', '=', $id_cliente)->get()->toArray();
        //Realizamos el conteo del valor total de los repuestos
        $totalValorRepuestos = 0;//Iniciliazamos la variable en 0
        $control = sizeOf($repuesto) ;
        for($i = 0 ; $i < $control ; $i++ ){
        $totalValorRepuestos = $totalValorRepuestos + $repuesto[$i]->valor_total_repuesto;
        }
       // setlocale(LC_MONETARY, 'en_US');
     //  $totalValorRepuestos = number_format($totalValorRepuestos, 0, ',', '.');



        //Consulta para traer los comentarios a la vista
        $anotacion = DB::table('observacion')
        ->where('id_ordenServicio', '=', $id_cliente) ->whereIn('tipo_observacion', [2, 3])->get()->toArray();
       ///Validamos si colocan en la URL un ID no valido
        if(sizeof($dataCliente) == 0){
            throw new \Throwable();
        }
        $arrayQuestion = $dataCliente[0];

        $Data = DB::table('orden_servicio as orden')
        ->join('cliente', 'orden.id_cliente_orden', '=', 'cliente.cliente_id')
        ->join('equipo', 'orden.id_equipo_orden', '=', 'equipo.equipo_id')
        ->leftjoin('departamentos', 'cliente.departamento_id', '=', 'departamentos.departamento_id')
        ->leftjoin('municipios', 'cliente.municipio_id', '=', 'municipios.municipio_id')
        ->leftjoin('usuario_empresa', 'orden.id_cliente_usuario_orden', '=', 'usuario_empresa.id_cliente_empresa')
        ->join('users', 'orden.id_tecnico_orden', '=', 'users.id')
        ->select('cliente.*', 'equipo.*', 'orden.*', 'departamentos.departamento_nombre','municipios.municipio_nombre','usuario_empresa.*','users.name' )
        ->whereRaw("orden.id_orden = $id_cliente")
        ->get()->toArray();
        $arrayData = $Data[0];
    } catch (\Throwable $e) {
        return view('errors.404');

    }
        return view('modulos.ordenServicio.verOrdenGeneral')->with('arrayData',$arrayData)
        ->with('diagnostico',$diagnostico)->with('Arraydiagnostico',$Arraydiagnostico)
        ->with('anotacion',$anotacion)->with('repuesto',$repuesto)->with('totalValorRepuestos',$totalValorRepuestos);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\consultorios  $consultorios
     * @return \Illuminate\Http\Response
     */
    public static function ordenSalidaPdf($rsemail ,$idOrden)
    {
        try{
        $sendEmail = $rsemail;
        $dataArray = DB::table('orden_servicio')
        ->where('id_orden', '=', $idOrden)->get()->toArray();
        $dataArray = $dataArray[0];
                $pdfData = DB::table('orden_servicio as orden')
                ->join('cliente', 'orden.id_cliente_orden', '=', 'cliente.cliente_id')
                ->join('equipo', 'orden.id_equipo_orden', '=', 'equipo.equipo_id')
                ->leftJoin('departamentos', 'cliente.departamento_id', '=', 'departamentos.departamento_id')
                ->leftJoin('municipios', 'cliente.municipio_id', '=', 'municipios.municipio_id')
                ->join('users', 'users.id', '=', 'orden.id_tecnico_orden')
                ->leftJoin('usuario_empresa', 'orden.id_cliente_usuario_orden', '=', 'usuario_empresa.id_cliente_empresa')
                ->select('cliente.*', 'equipo.*', 'users.name', 'orden.*', 'departamentos.departamento_nombre','municipios.municipio_nombre','usuario_empresa.*' )
                ->whereRaw("orden.id_orden = $idOrden")
                ->get()->toArray();
                $array = $pdfData[0];
                setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
                $fechaEntrada = $array->fecha_creacion_orden;
                $fechaEntrada= strftime("%d %b %Y",strtotime($fechaEntrada));
                $fechareparacion = $array->fecha_reparacion_orden;
                $fechareparacion= strftime("%d %b %Y",strtotime($fechareparacion));
                $fechaEntrega = $array->fecha_entrega_orden;
                $fechaEntrega= strftime("%d %b %Y",strtotime($fechaEntrega));

                $data = [
                    'orden' => $array->id_orden,
                    'fecha_ingreso' =>  $fechaEntrada,
                    'fecha_reparacion' =>  $fechareparacion,
                    'fecha_entrega' =>  $fechaEntrega,
                    'tipoCliente' => $array->cliente_tipo,
                    'nombre' => $array->cliente_nombres,
                    'documento' => $array->cliente_documento,
                    'correo'=> $array->cliente_correo,
                    'telefono' => $array->cliente_telefono,
                    'celular' => $array->cliente_celular,
                    'departamento' => $array->departamento_nombre,
                    'municipio' => $array->municipio_nombre,
                    'direccion' => $array->cliente_direccion,
                    'celular_usuario' => $array->usuario_celular,
                    'dependencia' => $array->usuario_dependencia,
                    'usuario' => $array->usuario_nombre,
                    'equipo' => $array->equipo_tipo,
                    'marca' => $array->equipo_marca,
                    'referencia' => $array->equipo_referencia,
                    'serial' => $array->equipo_serial,
                    'verficoFuncionamiento' => $array->verifica_funcionamiento_orden,
                    'reporteTecnico' => $array->reporte_tecnico_orden,
                    'accesorios' => $array->accesorios_orden,
                    'adaptador' => $array->serial_adaptador_orden,
                    'caracteristicas' => $array->caracteristicas_equipo_orden,
                    'dano' => $array->descripcion_dano_orden,
                    'tecnico' => $array->name,
                    'subTotal' => $array->valor_repuestos_orden,
                    'valorServicio' => $array->valor_servicio_orden,
                    'iva' => $array->iva_orden,
                    'totalOrden' => $array->valor_total_orden,
                ];

                $repuesto = DB::table('repuesto')
                ->join('orden_servicio as orden', 'orden.id_orden', '=', 'repuesto.id_orden_servicio_repuesto')
                ->select('repuesto.*', )
                ->whereRaw("orden.id_orden = $idOrden")
                ->get()->toArray(); ;


            $emailSend = $array->emailSend;

            $pdf = PDF::loadView('modulos.pdf.ordenSalida', $data ,  compact('repuesto')  );
            if($sendEmail == 'SI'){
                $SendEmail =  sendEmail::ordenSalidaEmail($pdf, $array);
            }
            $numeroOrden = $array->id_orden ;
        } catch (\Throwable $e) {
            return view('errors.404');

        }
            return $pdf->stream('Orden entrada Numero ' .($numeroOrden).'.pdf');



}

    public function destroy(OrdenServicio $OrdenServicio)
    {
        //
    }

    public function guardarOrden(Request $request)
    {
            $estadoOrden = 1; //INICIALIZAMOS LA VARIABLE EN EL ESTADO 1 (1-INGRESADO - 2-ORDEN TERMINADA - 3-ORDEN ENTREGADA)
            //Consultamos en parametros, para traer los dias de vencimiento
            $findVencimiento = ParametrosDetalle::where('nombre' ,'VENCIMIENTO ORDEN')->first();
            $diasVencimiento = $findVencimiento->valor ;
            $fechaVencimiento = '';
            $fechaVencimiento = date("Y-m-d G:i:s");
            $userCreated =  Auth()->user()->name;
            //REALIZAMOS EL CONTEO DE LOS DIA HABILES
            $dia = date("w", strtotime($fechaVencimiento));
            // Solo analizas si es día inhábil
            for($i = 0; $i < $diasVencimiento; $i++) {
                // Incrementar día
                $dia = $dia + 1;
                    // Reiniciar día si es necesario
                    if($dia == 7) {
                            $dia = 0;
                        }
                    if ($dia == 6) {
                    $diasVencimiento ++;
                    }
                    if($dia == 0 ){
                        $diasVencimiento ++;
                    }
            }
        // Sumas los días a la fecha
       $date_future = strtotime("+$diasVencimiento days", strtotime($fechaVencimiento));
       $fechaVencimiento = date('Y-m-d G:i:s', $date_future);
        $idcliente = $request->cliente_id;
        $emailSend = 1; // 1 Correo No Enviado -- 2 correo Si enviado
        $idUsuarioEmpresa = $request->usuario_empresa;
        $ordenServicio = new OrdenServicio;
        $fechaActual = new \DateTime();
        $servicio = implode(" - ", $request->servicio);//Se concatena el array que lleg de la vista de todos los servicios  con -

        $ordenServicio->id_cliente_orden = $idcliente;
        $ordenServicio->id_cliente_usuario_orden = $idUsuarioEmpresa;
        $ordenServicio->fecha_creacion_orden = $fechaActual;
        $ordenServicio->fecha_estimada_orden = $fechaVencimiento;
        $ordenServicio->id_equipo_orden = $request->equipo_id;
        $ordenServicio->accesorios_orden = $request->accesorios;
        $ordenServicio->serial_adaptador_orden = $request->serialAdaptatador;
        $ordenServicio->verifica_funcionamiento_orden = $request->verifica_funcionamiento;
        $ordenServicio->servicio_orden = $servicio;
        $ordenServicio->caracteristicas_equipo_orden = $request->caracteristicas_equipo;
        $ordenServicio->descripcion_dano_orden = $request->descripcion_dano;
        $ordenServicio->id_tecnico_orden = $request->tecnico;
        $ordenServicio->garantia_orden = $request->garantia;
        $ordenServicio->contrato_orden = $request->contrato;
        $ordenServicio->emailSend = $emailSend;
        $ordenServicio->estadoOrden = $estadoOrden;
        $ordenServicio->user_created = $userCreated;
        $ordenServicio->save();
        $response = Array('mensaje' => 'save'   );
        $response['dataOrden'] =$ordenServicio->toArray();//Devolvemos a la vista el array del cliente recien registrado
     return json_encode($response);
     $ordenServicio->toArray();
            //  $idOrden = $ordenServicio['id'];
            //  $prueba = 6 ;
            // $files = $this->generateFilesPDF([ ]);

            //$pasarPdf =  $this->generateFilesPDF($idOrden);
   }

   public function ordenEntradaEmailAndPDF(Request $request , $idOrden  )
   {


        // $dataArray = OrdenServicio::latest('id_orden')->first();
        //  $id = $dataArray['id_orden'];
        $dataArray = DB::table('orden_servicio')
        ->where('id_orden', '=', $idOrden)->get()->toArray();
        $dataArray = $dataArray[0];


            if($dataArray->id_cliente_usuario_orden == null || $dataArray->id_cliente_usuario_orden == 0){
                $pdfData = DB::table('orden_servicio as orden')
                ->join('cliente', 'orden.id_cliente_orden', '=', 'cliente.cliente_id')
                ->join('equipo', 'orden.id_equipo_orden', '=', 'equipo.equipo_id')
                ->join('departamentos', 'cliente.departamento_id', '=', 'departamentos.departamento_id')
                ->join('municipios', 'cliente.municipio_id', '=', 'municipios.municipio_id')
                ->join('users', 'users.id', '=', 'orden.id_tecnico_orden')
                ->select('cliente.*', 'equipo.*','users.name', 'orden.*', 'departamentos.departamento_nombre','municipios.municipio_nombre' )
                ->whereRaw("orden.id_orden = $idOrden")
                ->get()->toArray();

                $array = $pdfData[0];
                setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
                $fechaEntrada = $array->fecha_creacion_orden;
                $fechaEntrada= strftime("%d %b %Y",strtotime($fechaEntrada));
                $fechaEstimada = $array->fecha_estimada_orden;
                $fechaEstimada= strftime("%d %b %Y",strtotime($fechaEstimada));
                $data = [
                    'orden' => $array->id_orden,
                    'fecha_ingreso' => $fechaEntrada,
                    'fecha_estimada' => $fechaEstimada,
                    'tipoCliente' => $array->cliente_tipo,
                    'nombre' => $array->cliente_nombres,
                    'documento' => $array->cliente_documento,
                    'correo'=> $array->cliente_correo,
                    'telefono' => $array->cliente_telefono,
                    'celular' => $array->cliente_celular,
                    'departamento' => $array->departamento_nombre,
                    'municipio' => $array->municipio_nombre,
                    'direccion' => $array->cliente_direccion,
                    'equipo' => $array->equipo_tipo,
                    'marca' => $array->equipo_marca,
                    'referencia' => $array->equipo_referencia,
                    'serial' => $array->equipo_serial,
                    'verficoFuncionamiento' => $array->verifica_funcionamiento_orden,
                    'servicio' => $array->servicio_orden,
                    'accesorios' => $array->accesorios_orden,
                    'adaptador' => $array->serial_adaptador_orden,
                    'caracteristicas' => $array->caracteristicas_equipo_orden,
                    'dano' => $array->descripcion_dano_orden,
                    'tecnico' => $array->name,
                    'garantia' => $array->garantia_orden,
                    'contrato' => $array->contrato_orden

            ];
                }


        if( $dataArray->id_cliente_usuario_orden != null){



            $pdfData = DB::table('orden_servicio as orden')
                    ->join('cliente', 'orden.id_cliente_orden', '=', 'cliente.cliente_id')
                    ->join('equipo', 'orden.id_equipo_orden', '=', 'equipo.equipo_id')
                    ->leftjoin('departamentos', 'cliente.departamento_id', '=', 'departamentos.departamento_id')
                    ->leftjoin('municipios', 'cliente.municipio_id', '=', 'municipios.municipio_id')
                    ->leftjoin('usuario_empresa', 'orden.id_cliente_usuario_orden', '=', 'usuario_empresa.id_cliente_empresa')
                    ->join('users', 'users.id', '=', 'orden.id_tecnico_orden')
                    ->select('cliente.*', 'equipo.*', 'users.name', 'orden.*', 'departamentos.departamento_nombre','municipios.municipio_nombre','usuario_empresa.*' )
                    ->whereRaw("orden.id_orden = $idOrden")
                    ->get()->toArray();
        $array = $pdfData[0];//Caputaramos el Array en un Object
        setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
        $fechaEntrada = $array->fecha_creacion_orden;
        $fechaEntrada= strftime("%d %b %Y",strtotime($fechaEntrada));
        $fechaEstimada = $array->fecha_estimada_orden;
        $fechaEstimada= strftime("%d %b %Y",strtotime($fechaEstimada));

        $data = [
            'orden' => $array->id_orden,
            'fecha_ingreso' => $fechaEntrada,
            'fecha_estimada' => $fechaEstimada,
            'tipoCliente' => $array->cliente_tipo,
            'nombre' => $array->cliente_nombres,
            'documento' => $array->cliente_documento,
            'correo'=> $array->cliente_correo,
            'telefono' => $array->cliente_telefono,
            'celular' => $array->cliente_celular,
            'departamento' => $array->departamento_nombre,
            'municipio' => $array->municipio_nombre,
            'direccion' => $array->cliente_direccion,
            'celular_usuario' => $array->usuario_celular,
            'dependencia' => $array->usuario_dependencia,
            'usuario' => $array->usuario_nombre,
            'equipo' => $array->equipo_tipo,
            'marca' => $array->equipo_marca,
            'referencia' => $array->equipo_referencia,
            'serial' => $array->equipo_serial,
            'verficoFuncionamiento' => $array->verifica_funcionamiento_orden,
            'servicio' => $array->servicio_orden,
            'accesorios' => $array->accesorios_orden,
            'adaptador' => $array->serial_adaptador_orden,
            'caracteristicas' => $array->caracteristicas_equipo_orden,
            'dano' => $array->descripcion_dano_orden,
            'tecnico' => $array->name,
            'garantia' => $array->garantia_orden,
            'contrato' => $array->contrato_orden
            ];
            }
            $emailSend = $array->emailSend;
            //CAMBIAMOS ESTA, SI DECIDE NO ENVIAR POR CORREO LA ORDEN
            if( $request->get("email") == 'NO') {
                $emailSend = 2;
            }
            $pdf = PDF::loadView('modulos.pdf.ordenIngreso', $data );

            if($emailSend != 2){

                    DB::table('orden_servicio')
                    ->where('id_orden', $idOrden)
                    ->update(
                        [
                        'emailSend' => 2 //Cambiamos de estado el envio de EMAIL , para evitar que se siga enviando el correo
                        ]
                        );
                $SendEmail =  sendEmail::ordenEntradaEmail($pdf, $array);

                }
                $numeroOrden = $array->id_orden ;
            return $pdf->stream('Orden entrada N° ' .($numeroOrden).' .pdf');



}
public function ordenEntradaPDF($idOrden)
   {


        // $dataArray = OrdenServicio::latest('id_orden')->first();
        $idOrden =  decrypt($idOrden) ;
        //  $id = $dataArray['id_orden'];
        $dataArray = DB::table('orden_servicio')
        ->where('id_orden', '=', $idOrden)->get()->toArray();
        $dataArray = $dataArray[0];


            if($dataArray->id_cliente_usuario_orden == null || $dataArray->id_cliente_usuario_orden == 0){
                $pdfData = DB::table('orden_servicio as orden')
                ->join('cliente', 'orden.id_cliente_orden', '=', 'cliente.cliente_id')
                ->join('equipo', 'orden.id_equipo_orden', '=', 'equipo.equipo_id')
                ->leftjoin('departamentos', 'cliente.departamento_id', '=', 'departamentos.departamento_id')
                ->leftjoin('municipios', 'cliente.municipio_id', '=', 'municipios.municipio_id')
                ->join('users', 'users.id', '=', 'orden.id_tecnico_orden')
                ->select('cliente.*', 'equipo.*','users.name', 'orden.*', 'departamentos.departamento_nombre','municipios.municipio_nombre' )
                ->whereRaw("orden.id_orden = $idOrden")
                ->get()->toArray();

                $array = $pdfData[0];
                setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
                $fechaEntrada = $array->fecha_creacion_orden;
                $fechaEntrada= strftime("%d %b %Y",strtotime($fechaEntrada));
                $fechaEstimada = $array->fecha_estimada_orden;
                $fechaEstimada= strftime("%d %b %Y",strtotime($fechaEstimada));
                $data = [
                    'orden' => $array->id_orden,
                    'fecha_ingreso' => $fechaEntrada,
                    'fecha_estimada' => $fechaEstimada,
                    'tipoCliente' => $array->cliente_tipo,
                    'nombre' => $array->cliente_nombres,
                    'documento' => $array->cliente_documento,
                    'correo'=> $array->cliente_correo,
                    'telefono' => $array->cliente_telefono,
                    'celular' => $array->cliente_celular,
                    'departamento' => $array->departamento_nombre,
                    'municipio' => $array->municipio_nombre,
                    'direccion' => $array->cliente_direccion,
                    'equipo' => $array->equipo_tipo,
                    'marca' => $array->equipo_marca,
                    'referencia' => $array->equipo_referencia,
                    'serial' => $array->equipo_serial,
                    'verficoFuncionamiento' => $array->verifica_funcionamiento_orden,
                    'servicio' => $array->servicio_orden,
                    'accesorios' => $array->accesorios_orden,
                    'adaptador' => $array->serial_adaptador_orden,
                    'caracteristicas' => $array->caracteristicas_equipo_orden,
                    'dano' => $array->descripcion_dano_orden,
                    'tecnico' => $array->name,
                    'garantia' => $array->garantia_orden,
                    'contrato' => $array->contrato_orden

            ];
                }


        if( $dataArray->id_cliente_usuario_orden != null){



            $pdfData = DB::table('orden_servicio as orden')
                    ->join('cliente', 'orden.id_cliente_orden', '=', 'cliente.cliente_id')
                    ->join('equipo', 'orden.id_equipo_orden', '=', 'equipo.equipo_id')
                    ->leftjoin('departamentos', 'cliente.departamento_id', '=', 'departamentos.departamento_id')
                    ->leftjoin('municipios', 'cliente.municipio_id', '=', 'municipios.municipio_id')
                    ->leftjoin('usuario_empresa', 'orden.id_cliente_usuario_orden', '=', 'usuario_empresa.id_cliente_empresa')
                    ->join('users', 'users.id', '=', 'orden.id_tecnico_orden')
                    ->select('cliente.*', 'equipo.*', 'users.name', 'orden.*', 'departamentos.departamento_nombre','municipios.municipio_nombre','usuario_empresa.*' )
                    ->whereRaw("orden.id_orden = $idOrden")
                    ->get()->toArray();
        $array = $pdfData[0];//Caputaramos el Array en un Object
        setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
        $fechaEntrada = $array->fecha_creacion_orden;
        $fechaEntrada= strftime("%d %b %Y",strtotime($fechaEntrada));
        $fechaEstimada = $array->fecha_estimada_orden;
        $fechaEstimada= strftime("%d %b %Y",strtotime($fechaEstimada));

        $data = [
            'orden' => $array->id_orden,
            'fecha_ingreso' => $fechaEntrada,
            'fecha_estimada' => $fechaEstimada,
            'tipoCliente' => $array->cliente_tipo,
            'nombre' => $array->cliente_nombres,
            'documento' => $array->cliente_documento,
            'correo'=> $array->cliente_correo,
            'telefono' => $array->cliente_telefono,
            'celular' => $array->cliente_celular,
            'departamento' => $array->departamento_nombre,
            'municipio' => $array->municipio_nombre,
            'direccion' => $array->cliente_direccion,
            'celular_usuario' => $array->usuario_celular,
            'dependencia' => $array->usuario_dependencia,
            'usuario' => $array->usuario_nombre,
            'equipo' => $array->equipo_tipo,
            'marca' => $array->equipo_marca,
            'referencia' => $array->equipo_referencia,
            'serial' => $array->equipo_serial,
            'verficoFuncionamiento' => $array->verifica_funcionamiento_orden,
            'servicio' => $array->servicio_orden,
            'accesorios' => $array->accesorios_orden,
            'adaptador' => $array->serial_adaptador_orden,
            'caracteristicas' => $array->caracteristicas_equipo_orden,
            'dano' => $array->descripcion_dano_orden,
            'tecnico' => $array->name,
            'garantia' => $array->garantia_orden,
            'contrato' => $array->contrato_orden
            ];
            }
            $emailSend = $array->emailSend;

            $pdf = PDF::loadView('modulos.pdf.ordenIngreso', $data );
             $numeroOrden = $array->id_orden ;
            return $pdf->stream('Orden entrada N° ' .($numeroOrden).' .pdf');

        // $emailpdf = new MailEmailPdf;


        //  Mail::to('rafael.puentez@gmail.com')->send($emailpdf)->attachData($pdf->output(), "test.pdf");



        //   Mail::to("rafael.puentez@gmail.com")->send(new EmailPdf($datosCorreo));

}
public function cambiarEstadoOrden(Request $request)
{
    try {
        $response = array('state' => 'save' ,  'message' => 'Guardado Correctamente');
        $ordenServicio =  OrdenServicio::where('id_orden',$request->idOrden)->first();
        $newEstado = $ordenServicio->estadoOrden - 1;//Restamos 1 estado.
        if($newEstado == 0){
            $response['state'] = 'error';
            $response['message'] = 'No se puede cambiar estado a "REPARACION"';
        }else{
            DB::table('orden_servicio')
            ->where('id_orden', $request->idOrden)
            ->update( [
                'estadoOrden' => $newEstado ] );
        }
    } catch (\Throwable $e) {
        $response['state'] = 'error';
        $response['message'] = 'Ocurrio un error '.$e;
    }
    return json_encode($response);
}

public function editarReporteTecnico(Request $request)
{
    $idOrden = $request->idOrden;
    $editReporte = $request->editReporte;


    DB::table('orden_servicio')
    ->where('id_orden', $idOrden)
    ->update( [
        'reporte_tecnico_orden' => $editReporte ] );

    $response = Array('mensaje' => 'update' );
    return json_encode($response);
}

public function changePrice(Request $request)
{

    $valorServicio = $request->valorservicio;
    $valorTotalRepuesto = $request->totalValorRepuestos;
    $idOrden = $request->idOrden;
   if($request->iva == 'SI' ){
       $iva = $valorServicio * 0.19;
       $iva =  intval($iva * 1) / 1;
       $totalOrden = $iva + $valorTotalRepuesto + $valorServicio;
   }else{
       $iva = 0;
       $totalOrden = $valorServicio + $valorTotalRepuesto;
   }


    DB::table('orden_servicio')
    ->where('id_orden', $idOrden)
    ->update( [
        'iva_orden' => $iva,
        'valor_servicio_orden' => $valorServicio,
        'valor_total_orden' => $totalOrden  ] );

    $response = Array('mensaje' => 'update' );
    return json_encode($response);
}
public function ordenBlanco($event)
{
    $data = [
        'orden' => '',
        'fecha_ingreso' =>  '',
        'fecha_reparacion' =>  '',
        'fecha_entrega' =>  '',
        'fecha_ingreso' =>'',
        'fecha_estimada' => '',
        'tipoCliente' => '',
        'nombre' => '',
        'documento' => '',
        'correo'=> '',
        'telefono' => '',
        'celular' => '',
        'departamento' => '',
        'municipio' =>'',
        'direccion' =>'',
        'celular_usuario' => '',
        'dependencia' => '',
        'usuario' => '',
        'equipo' => '',
        'marca' => '',
        'referencia' => '',
        'serial' => '',
        'verficoFuncionamiento' => '',
        'servicio' => '',
        'accesorios' => '',
        'adaptador' => '',
        'caracteristicas' => '',
        'dano' => '',
        'tecnico' => str_repeat ("_", 38),
        'garantia' => '',
        'contrato' => '',
        'subTotal' => 0,
        'valorServicio' => 0,
        'iva' => 0,
        'totalOrden' => 0,
        'reporteTecnico' => ''
        ];
        $repuesto = [];
        if($event == 'entrada'){
            $pdf = PDF::loadView('modulos.pdf.ordenIngreso', $data );
        }else if($event == 'salida'){
            $pdf = PDF::loadView('modulos.pdf.ordenSalida', $data, compact('repuesto') );
        }

        return $pdf->stream('Orden ' .($event).' en blanco.pdf');

}


}

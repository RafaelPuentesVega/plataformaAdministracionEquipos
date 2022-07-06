<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Departamentos;
use App\Models\Municipios;
use App\Models\UsuarioEmpresa;

class ClientesController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');

    }
    public function index()
    {

           //$consultorios = cliente::all();


            //->with('cliente',$consultorios);
            $departamentos = Departamentos::all();
            $municipios = Municipios::all();
            $clientes = Clientes::all();
           // dd($clientes);
            return view('modulos.cliente')
            ->with('departamentos',$departamentos)
            ->with('municipios',$municipios)
            ->with('clientes' ,$clientes) ;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $departamentos = Departamentos::all();
        $municipios = Municipios::all();
        return view('modulos.crear_cliente')
        ->with('departamentos',$departamentos)
        ->with('municipios',$municipios);
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

       Clientes::create([

        'cliente_tipo'=>$datos['cliente_tipo'],
        'cliente_documento'=>$datos['cliente_documento'],
        'cliente_nombres'=>$datos['cliente_nombres'],
        'cliente_correo'=>$datos['cliente_correo'],
        'cliente_direccion'=>$datos['cliente_direccion'],
        'cliente_celular'=>$datos['cliente_celular'],
        'cliente_telefono'=>$datos['cliente_telefono'],
        'departamento_id'=>$datos['departamento_id'],
        'municipio_id'=>$datos['municipio_id'],
        'cliente_dependencia_empresa'=>$datos['cliente_dependencia_empresa'],
        'cliente_usuario_empresa'=>$datos['cliente_usuario_empresa'],
        'cliente_celular_usuario'=>$datos['cliente_celular_usuario'],
        'cliente_estado'=>"Activo"

       ]);
      return redirect()->back()->withInput()->withErrors('Se guardo correctamente el cliente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function editCliente($idcliente)
    {
        $idcliente =  decrypt($idcliente) ;

        $dataCliente = DB::table('cliente')
        ->leftJoin('departamentos', 'cliente.departamento_id', '=', 'departamentos.departamento_id')
        ->leftJoin('municipios', 'cliente.municipio_id', '=', 'municipios.municipio_id')
        ->where('cliente_id', '=', $idcliente)->get()->toArray();
        $dataCliente=$dataCliente[0];

        $arrayOrden = DB::table('orden_servicio')
        //Agregar seguridad al select
        ->leftJoin('users', 'orden_servicio.id_tecnico_orden', '=', 'users.id')
        ->leftJoin('equipo', 'orden_servicio.id_equipo_orden', '=', 'equipo.equipo_id')
        ->select('orden_servicio.*', 'users.name','equipo.*')
        ->where('id_cliente_orden', '=', $idcliente)->get()->toArray();

        $arrayEquipo = DB::table('equipo')
        ->where('equipo_cliente_id', '=', $idcliente)->get()->toArray();

        $arrayUsuarioEmpresa = DB::table('usuario_empresa')
        ->where('id_cliente_usuario', '=', $idcliente)->get()->toArray();
        //  dd($arrayUsuarioEmpresa);
        //dd($idcliente);
        return view('modulos.cliente.editarCliente')
        ->with('dataCliente' ,$dataCliente)
        ->with('arrayEquipo' ,$arrayEquipo)
        ->with('arrayUsuarioEmpresa' ,$arrayUsuarioEmpresa)
        ->with('arrayOrden' ,$arrayOrden);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clientes $clientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clientes $clientes)
    {
        //
    }

    public function consultarCliente(Request $request){

        $data = $request->all();
             $response = Array("mensaje"=>"ok");
             $response['data'] = DB::table('cliente')
                ->where('cliente_id', '=', $data['id'])
                ->get()->toArray();
             return json_encode($response);
    }
    public function consultarClienteEnter(Request $request){

        $data = $request->all();
             $response = Array("mensaje"=>"ok");
             $response['data'] = DB::table('cliente')
                ->where('cliente_documento', '=', $data['id'])
                ->get()->toArray();
             return json_encode($response);
    }
    public function consultarUsuarioEmpresa(Request $request){

        $data = $request->all();
        $response = Array("mensaje"=>"ok");
        $response['data'] = DB::table('usuario_empresa')
           ->where('id_cliente_usuario', '=', $data['id'])
           ->get()->toArray();

        return json_encode($response);
        //
    }
    public function SeleccionarUsaurioEmpresa(Request $request){

        $data = $request->all();
        $response = Array("mensaje"=>"ok");
        $response['data'] = DB::table('usuario_empresa')
           ->where('id_cliente_empresa', '=', $data['id'])
           ->get()->toArray();

        return json_encode($response);
        //
    }
    public function guardarUsuarioEmpresa(Request $request){


        $idUsuarioEmpresa = $request->usuario_empresa;
        $cliente = new UsuarioEmpresa;
        $fechaActual = new \DateTime();
        $fechaActual->format('Y-m-d');//revisar



            if(mb_strlen($idUsuarioEmpresa) == 0 ){ //Validamos si trae el id de la vista, para decidir si crearlo o actualizarlo

                $cliente->usuario_dependencia = $request->cliente_dependencia_empresa;
                $cliente->usuario_nombre = $request->cliente_usuario_empresa;
                $cliente->usuario_celular = $request->cliente_celular_usuario;
                $cliente->id_cliente_usuario = $request->cliente_id;
                $cliente->usuario_created_at = $fechaActual;
                $cliente->save();

                $response = Array("mensaje"=>"save");
                $response['dataUsuario'] =$cliente->toArray();//Devolvemos a la vista el array del cliente recien Guardado
                }else{
                    DB::table('usuario_empresa')
                    ->where('id_cliente_empresa', $idUsuarioEmpresa)
                    ->update(
                        [
                        //'usuario_dependencia' => $request->cliente_dependencia_empresa,
                        //'usuario_nombre' => $request->cliente_usuario_empresa,
                        'usuario_celular' => $request->cliente_celular_usuario
                        ]
                    );

                    $response = Array("mensaje"=>"update");
                }

            return json_encode($response);
    }

    public function guardarCliente(Request $request){


                $idcliente = $request->cliente_id;
                $cliente = new Clientes;
                $fechaActual = new \DateTime();
                $fechaActual->format('Y-m-d');//revisar

                $consultarDocumento = DB::table('cliente')
                ->where('cliente_documento', '=', $request->cliente_documento)
                ->get()->toArray();



//Validamos si trae el id de la vista, para decidir si crearlo o actualizarlo
            if(sizeof($consultarDocumento) == 0 ){

                if(mb_strlen($idcliente) == 0){

                        $cliente->cliente_tipo = $request->cliente_tipo;
                        $cliente->cliente_documento = $request->cliente_documento;
                        $cliente->cliente_nombres = $request->cliente_nombres;
                        $cliente->cliente_correo = $request->cliente_correo;
                        $cliente->cliente_direccion = $request->cliente_direccion;
                        $cliente->cliente_celular = $request->cliente_celular;
                        $cliente->cliente_telefono = $request->cliente_telefono;
                        $cliente->departamento_id = $request->departamento_id;
                        $cliente->municipio_id = $request->municipio_id;
                        $cliente->cliente_created_at = $fechaActual;
                        $cliente->save();

                    $response = Array("mensaje"=>"save");
                    $response['dataCliente'] =$cliente->toArray();//Devolvemos a la vista el array del cliente recien Guardado
                    }
                }
                if(mb_strlen($idcliente) != 0 ){
                    DB::table('cliente')
                    ->where('cliente_id', $idcliente)
                    ->update(
                        ['cliente_correo' => $request->cliente_correo,
                        'cliente_direccion' => $request->cliente_direccion,
                        'cliente_celular' => $request->cliente_celular,
                        'cliente_telefono' => $request->cliente_telefono,
                        'departamento_id' => $request->departamento_id,
                        'municipio_id' => $request->municipio_id,
                        ]

                    );
                    $response = Array("mensaje"=>"update");
                }
                if(sizeof($consultarDocumento) != 0 && mb_strlen($idcliente) == 0){
                //   dd('entro CE');
                    $response = Array("mensaje"=>"clienteCreado");
                    $response['dataCliente'] =  $consultarDocumento;
                }



                return json_encode($response);
    }
}

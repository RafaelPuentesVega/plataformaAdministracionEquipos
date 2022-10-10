<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\OrdenServicio;
use App\Http\Controllers\sendEmail;
use App\Models\NotificacionesEmail;



class SendEmailCliente extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:emailClient';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle()
    {
        $ordenServicio = OrdenServicio::
        join('cliente', 'id_cliente_orden', '=', 'cliente.cliente_id')
        ->join('equipo', 'id_equipo_orden', '=', 'equipo.equipo_id')
        ->whereNotNull('fecha_reparacion_orden')
        ->whereNull('fecha_entrega_orden')
        ->where('estadoOrden' , '2')
        ->where('id_orden' , '6')
        ->get()->toArray();
        //Consultamos los dias de vencimientos parametros
        $notificacionCliente = NotificacionesEmail::
        where('descripcion' , 'NOTIFICACION CLIENTE ORDEN TERMINADA')
        ->select('dias')->get()->toArray();
         $control = sizeof($ordenServicio) -1;
         $fechaActual = date("Y-m-d H:i:s");
         $sumarDias = $notificacionCliente[0]['dias'];
        for ($i = 0; $i <= $control; $i++) {

         $fechaNotificacion = $ordenServicio[$i]['notificacion_cliente'] ;
         $dia = date("w", strtotime($fechaNotificacion));
         // Solo analizas si es día inhábil
         for($i = 0; $i < $sumarDias ; $i++) {
             // Incrementar día
             $dia = $dia + 1;
                 // Reiniciar día si es necesario
                 if($dia == 7) {
                        $dia = 0;
                     }
                 if ($dia == 6) {
                 $sumarDias ++;
                 }
                 if($dia == 0 ){
                     $sumarDias ++;
                 }
         }
         $fechaSumDaysNotificacion =  date("Y-m-d H:i:s",strtotime($fechaNotificacion."+".$sumarDias." days"));
         if($fechaNotificacion == null){
                DB::table('observacion')->insert([
                    'id_ordenServicio' => $ordenServicio[$i]['id_orden'],
                    'tipo_observacion' => 3,
                    'descripcion_observacion' => 'SE NOTIFICA AL CLIENTE POR MEDIO DE CORREO ELECTRONICO, INFORMANDO QUE EL EQUIPO SE ENCUENTRA LISTO PARA SU ENTREGA.',
                    'user_observacion' => 'NOTIFICACIONES AUTOMATICAS BYG',
                    'created_at_observacion' => $fechaActual
                ]);
                 DB::table('orden_servicio')
                 ->where('id_orden', $ordenServicio[$i]['id_orden'])
                 ->update( [
                     'notificacion_cliente' => $fechaActual
                     ] );
                     $array = $ordenServicio[$i];
                // $SendEmail =  sendEmail::notificacionCliente( $array);
             }elseif($fechaActual >= $fechaSumDaysNotificacion){
                DB::table('observacion')->insert([
                    'id_ordenServicio' => $ordenServicio[$i]['id_orden'],
                    'tipo_observacion' => 3,
                    'descripcion_observacion' => 'SE NOTIFICA AL CLIENTE POR MEDIO DE CORREO ELECTRONICO, INFORMANDO QUE EL EQUIPO SE ENCUENTRA LISTO PARA SU ENTREGA.',
                    'user_observacion' => 'NOTIFICACIONES AUTOMATICAS BYG',
                    'created_at_observacion' => $fechaActual
                ]);
                 DB::table('orden_servicio')
                 ->where('id_orden', $ordenServicio[$i]['id_orden'])
                 ->update( [
                     'notificacion_cliente' => $fechaActual
                     ] );
                     $array = $ordenServicio[$i];
                    // $SendEmail =  sendEmail::notificacionCliente( $array);
             }
         }
    }
}

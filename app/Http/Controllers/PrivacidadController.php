<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrivacidadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {

        $usuario = User::all();


    return view('modulos.privacidad.privacidad')->with('usuario', $usuario);
    }

    public function update(Request $request)
    {
        // Validar los datos
        $this->validate($request, [
            'password' => 'required|confirmed|min:6|max:32',
        ]);
        // Note la regla de validación "confirmed", que solicitará que usted agregue un campo extra llamado password_confirm

        //$user = new User;
        $user =Auth::user(); // Obtenga la instancia del usuario en sesión
        $password = bcrypt($request->password); // Encripte el password
        $user = new User;

        $user->password = $password; // Rellene el usuario con el nuevo password ya encriptado
        $user->save(); // Guarde el usuario

        Session::flash('message','Creado Exitosamente');
        // Por ultimo, redirigir al usuario, por ejemplo al formulario anterior, con un mensaje de que el password fue actualizado
        return redirect()->back()->withSuccess('Password actualizado');
    }
    public function consultarUsuario(Request $request){
        try {

            $response['data'] = User::where('id', $request->id )->select('id','email','name','rol','telefono','state')->get();
            $response['mensaje'] = 'ok';

        } catch (\Throwable $th) {
            $response = Array('mensaje' =>'error');
            return json_encode($response);
        }
        return json_encode($response);
    }
    public function updateuser(Request $request){
        try {
            if($request->mdstate == 'ACTIVO'){
                $estado = 1;
            }else if($request->mdstate == 'INACTIVO'){
                $estado = 2;
            }else{
                $estado = 2;
            }
            $usuario = User::findOrFail($request->mdid);
            $usuario->name = $request->mdname;
            $usuario->email = $request->mdemail;
            $usuario->telefono = $request->mdcelular;
            $usuario->rol = $request->mdrol;
            $usuario->state = $estado;
            $usuario->save();

        } catch (\Exception $e) {
            session()->flash('alert', 'danger');
            session()->flash('message', 'Ocurrio un error actualizando');
            return redirect()->back();
        }
        session()->flash('alert', 'success');
        session()->flash('message', 'Actualizado correctamente');
        return redirect()->back();
    }

}

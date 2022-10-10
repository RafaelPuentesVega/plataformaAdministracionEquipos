<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        // Por ultimo, redirigir al usuario, por ejemplo al formulario anterior, con un mensaje de que el password fue actualizado
        return redirect()->back()->withSuccess('Password actualizado');
    }
}

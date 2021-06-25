<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function Registrar(Request $request)
    {
        User::create([
        	'name' => $request->nombre,
        	'email' => $request->email,
        	'password' => bcrypt($request->password),
        ]);

        return redirect(route('user.files'));
    }

    public function eliminarImagen($user, $imagen)
    {
    	$usuario = User::where('id', $user)->first();

        $imagenes = $usuario->getMedia('UserProfile');
        $imagenes[$imagen]->delete();

       $user = Auth::user();
       return view('Usuarios.index', compact('user'));
    }
}

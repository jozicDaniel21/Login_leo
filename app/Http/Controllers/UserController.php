<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
}

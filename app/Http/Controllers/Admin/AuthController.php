<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginform()
    {
        return view('admin.index');
    }
    public function home()
    {
        # code...
        return view('admin.dashboard');
    }
    public function login(Request $request)
    {
        # verificar sem tem um dado em branco
        if(in_array('', $request->only('email', 'password'))):
            $json['message'] = "Informe os dados para iniciar a sessão";
            return response()->json($json);
        endif;

    }
}

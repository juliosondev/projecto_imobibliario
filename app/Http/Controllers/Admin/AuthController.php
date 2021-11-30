<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginform()
    {
        // $user = User::where('id', 1)->first();
        // $user->password = Hash::make('123');
        // $user->save();
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
            $json['message'] = $this->mensagem->success('Informe os dados para iniciar a sessão')->render();
            return response()->json($json);
        endif;
        #Validar email
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)):
            $json['message'] = $this->mensagem->erro('Informe um email válido')->render();
            return response()->json($json);
        endif;
        $credencias = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(!Auth::attempt($credencias)):
            $json['message'] = $this->mensagem->erro('Senha ou password errada')->render();
            return response()->json($json);
        endif;
        $json['redirect'] = route('admin.home');
        return response()->json($json);

    }
}

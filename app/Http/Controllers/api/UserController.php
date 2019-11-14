<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 

class UserController extends Controller
{
    public function index () {
        $all = User::all();
        return response()->json($all);
    }

    public function show (User $id) {
        return $id;
    }

    public function store (Request $request) {
        try {
            $user = new User;

            $user->cpf = $request->cpf;
            $user->name = $request->name;
            $user->endereco = $request->endereco;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->id_profissao = $request->id_profissao;
            $user->id_perfil = $request->id_perfil;

            $user->save();
            return response()->json(['msg' => 'Cadastro do usuário feito com sucesso'], 200);
        } catch (\Exception $e) {
            if(config('app.debug')) {
                return response()->json($e->getMessage(),500);
            }
            return response()->json(['msg' => 'Houve um erro ao realizar o cadastro do usuário'], 500);
        }
    }

    public function login (Request $request) {
        try {
            $email = $request->email;
            $password = $request->password;

            $hashedPassword = DB::select("SELECT password FROM users WHERE email='$email'");

            if (Hash::check($password, $hashedPassword[0]->password)) {
                $contaAutenticada = array('email' => $email, 'password' => $password);
                return response()->json($contaAutenticada, 201);
            }
            return response()->json('Senha incorreta', 501);
        } catch (\Exception $e) {
            if(config('app.debug')) {
                return response()->json($e->getMessage(),500);
            }
            return response()->json(['msg' => 'Houve um erro ao realizar o cadastro do usuário'], 500);
        }
    }
}

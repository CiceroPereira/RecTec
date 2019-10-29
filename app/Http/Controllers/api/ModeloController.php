<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Modelo;

class ModeloController extends Controller
{
    public function index () {
        $all = Modelo::all();
        return response()->json($all);
    }
    public function store (Request $request) {
        try {
            $modelo = new Modelo;

            $modelo->tipo = $request->tipo;
            $modelo->descricao = $request->descricao;

            $modelo->save();
            return response()->json(['msg' => 'Cadastro do modelo feito com sucesso'], 200);
        } catch (\Exception $e) {
            if(config('app.debug')) {
                return response()->json($e->getMessage(),500);
            }
            return response()->json(['msg' => 'Houve um erro ao realizar o cadastro do modelo'], 500);
        }
    }
}

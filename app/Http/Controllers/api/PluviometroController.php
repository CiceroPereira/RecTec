<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pluviometro;
use Illuminate\Support\Facades\DB;
//use App\Models\Modelo;

class PluviometroController extends Controller {
    public function index () {
        $all = Pluviometro::all();
        return response()->json($all);
    }
    public function store (Request $request) {
        try {
            $pluviometro = new Pluviometro;
            //$all = Modelo::all();

            $pluviometro->pluviometroId = $request->nome;
            $pluviometro->data_instalacao = $request->data;
            $pluviometro->latitude = $request->latitude;
            $pluviometro->longitude = $request->longitude;
            $pluviometro->modelo_id = $request->tipo;

            $pluviometro->save();
            return response()->json(['msg' => 'Cadastro de pluviometro feito com sucesso'], 200);
        } catch (\Exception $e) {
            if(config('app.debug')) {
                return response()->json($e->getMessage(),500);
            }
            return response()->json(['msg' => 'Houve um erro ao realizar o registro do pluviometro'], 500);
        }
    }
}

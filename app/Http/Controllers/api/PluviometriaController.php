<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pluviometria;
use Illuminate\Support\Facades\DB;

class PluviometriaController extends Controller {

    public function index() {
        $all = Pluviometria::all();
        return response()->json($all);
    }

    public function show(Pluviometria $id) {
        return $id;
    }

    public function store(Request $request) {
        try {
            set_time_limit(0);
            $accessToken = '';
        
            $pluviometro_id = $request->input('pluviometro_id');
            if($pluviometro_id == 2){
                $lamina = $request->input('lamina');
                $lamina = $lamina/(16.28601632);
            }else{
                $lamina = $request->input('lamina'); 
            }

            $hora = $request->input('hora');
            $data = $request->input('data');
            $user_id = $request->input('user_id');
        
            DB::table('pluviometrias')->insert(
                ['data' => $data, 'hora' => $hora, 'lamina' => $lamina,
                'user_id' => $user_id, 'pluviometro_id' => $pluviometro_id ]
            );

            return response()->json(['msg' => 'Registro da pluviometria feito com sucesso'], 200);
        } catch (\Exception $e){
            if(config('app.debug')) {
                return response()->json($e->getMessage(),500);
            }
            return response()->json(['msg' => 'Houve um erro ao realizar o registro da pluviometria'], 500);
        }
    }

    public function update(Request $request, $id) {
        try {
            set_time_limit(0);
            $accessToken = '';
            $dado = Pluviometria::findOrFail($id);

            if($dado->pluviometro_id == 2){
                $lamina = $request->lamina;
                $lamina = $lamina/(16.28601632);
            }else{
                $lamina = $request->lamina; 
            }

            $dado->lamina = $lamina;
            $dado->hora = $request->hora;
            $dado->data = $request->data;
            $dado->pluviometro_id = $request->pluviometro_id;
            $dado->update();

            return response()->json(['msg' => 'Atualização da pluviometria feita com sucesso'], 201);
        } catch (\Exception $e){
            if(config('app.debug')) {
                return response()->json($e->getMessage(),500);
            }
            return response()->json(['msg' => 'Houve um erro na atualização do registro da pluviometria'], 500);
        }
    }

    public function delete(Pluviometria $id) {
       try {
           $id->delete();
           return response()->json(['msg' => 'Remoção da pluviometria feita com sucesso'], 201);
       } catch (\Exception $e) {
            if(config('app.debug')) {
                return response()->json($e->getMessage(),500);
            }
            return response()->json(['msg' => 'Houve um erro na remoção do registro da pluviometria'], 500);
       }
    }
}

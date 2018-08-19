<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pluviometria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PluviometriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = DB::table('pluviometrias')->simplePaginate(10);
        //dd($all);
        return view('list', compact('all'));
       // return $all->toJson();
    }
/*
    public function indexx()
    {
        $all = DB::table('pluviometrias')->simplePaginate(10);
        return $all->toJson();
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $pluviometria = new Pluviometria;
        $pluviometria->lamina = $request->lamina;
        $pluviometria->hora = $request->hora;
        $pluviometria->data = $request->data;
        $pluviometria->user_id = $request->user_id;
        $pluviometria->pluviometro_id = $request->pluviometro_id;
        $pluviometria->save();   
       // dd($request->all());
        return redirect()->back()->with('message', 'Medição inserida com sucesso!');
        */
      //  Log::info('Inicio inserção');
        $lamina = $request->input('lamina');
        $hora = $request->input('hora');
        $data = $request->input('data');
        $user_id = $request->input('user_id');
        $pluviometro_id = $request->input('pluviometro_id');

        DB::table('pluviometrias')->insert(
            ['data' => $data, 'hora' => $hora, 'lamina' => $lamina,
            'user_id' => $user_id, 'pluviometro_id' => $pluviometro_id ]
        );
      //  Log::info('Inserção realizada com sucesso');
        return redirect()->back()->with('message', 'Medição inserida com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showConfig(){

        if (Auth::user()->id_perfil != 1) {
            return redirect('/');
        }

        $all = DB::table('users')->get();
        $pluviometro = DB::table('pluviometro')->get();

        return view('config', compact('all','pluviometro'));

    }

    public function config(Request $request){


        if (Auth::user()->id_perfil != 1) {
            return redirect('/');
        }

        $user_id = $request->input('user_id');
        $pluviometro_id = $request->input('pluviometro_id');

        

        DB::table('usuario_pluviometro')->insert(
            ['usuario_id' => $user_id, 'pluviometro_id' => $pluviometro_id]
        );
      //  Log::info('Inserção realizada com sucesso');
        return redirect()->back()->with('message', 'Configuração realizada com sucesso!');

    }
}

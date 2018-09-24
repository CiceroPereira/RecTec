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
        $all = Pluviometria::paginate(10);
      //  $all = DB::table('pluviometrias')->simplePaginate(10);
     //   $nomes = DB::table('users')->get();
      // dd($all);
        $modelo = DB::table('modelo')->get();
        $names = DB::table('users')->get();
        return view('list', compact('all', 'names', 'modelo'));
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
        return redirect()->back()->with('message', 'Medição inserida com sucesso!')->with('data', $hora);

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

        $all = DB::table('pluviometro')->get();
        $tipo = DB::table('modelo')->get();
        $medidor = DB::table('usuario_pluviometro')->where('usuario_id', '=', Auth::user()->id)->get();

        $dado = Pluviometria::findOrFail($id);
        return view('editar', compact('dado', 'all', 'tipo', 'medidor'));
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
        $dado = Pluviometria::findOrFail($id);
        $dado->lamina = $request->lamina;
        $dado->hora = $request->hora;
        $dado->data = $request->data;
        $dado->pluviometro_id = $request->pluviometro_id;
        $dado->update(); 
        return redirect('/listar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dado = Pluviometria::findOrFail($id);
        $dado->delete();
        return back()->with(['success' => 'Dado deletado com sucesso']);
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

        if (DB::table('usuario_pluviometro')->where('usuario_id', '=', $user_id, 'AND', 'pluviometro_id', '=', $pluviometro_id)){
            return redirect()->back()->with('message2', 'O usuário já possui acesso a este pluviometro!');
        }

        DB::table('usuario_pluviometro')->insert(
            ['usuario_id' => $user_id, 'pluviometro_id' => $pluviometro_id]
        );
      //  Log::info('Inserção realizada com sucesso');
        return redirect()->back()->with('message', 'Configuração realizada com sucesso!');

    }

    public function buscaIntervalo(Request $request){

        $date_one = $request->date_one;
        $date_two = $request->date_two;

        $modelo = DB::table('modelo')->get();
        $names = DB::table('users')->get();
        $all = Pluviometria::whereBetween('data',array( $date_one, $date_two))->paginate(10);

//        dd($all);
       return view('list', compact('all', 'names', 'modelo'));

    }

    public function buscaUser(Request $request){

        $modelo = DB::table('modelo')->get();
        $names = DB::table('users')->get();
        $all = Pluviometria::where('user_id', '=',$request->user_id)->paginate(10);

      //  dd($all);
        return view('list', compact('all', 'names', 'modelo'));

    }

    public function buscaTipo(Request $request){

        $modelo = DB::table('modelo')->get();
        $names = DB::table('users')->get();
        $all = Pluviometria::where('pluviometro_id', '=', $request->pluviometro_id)->paginate(10);

        return view('list', compact('all', 'names', 'modelo'));

    }
}

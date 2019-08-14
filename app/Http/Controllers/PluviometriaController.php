<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pluviometria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

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
        
        if($pluviometro_id == 1){ //2018-prae-01
                    $accessToken = 'vOmwtG6lDLjle11arv8L';
                }
                elseif ($pluviometro_id == 2) { //2018-prae-02
                    $accessToken = '12yzaUftpb0e5jKyGTq6';
                }
                elseif ($pluviometro_id == 3) { //2018-dois-irmaos-01
                    $accessToken = 'goGguuGHKCpurEXy1dlN';
                }
                elseif ($pluviometro_id == 4) { //2018-nazare-01
                    $accessToken = 'vdCTGPJwZJi7AwoV4iR5';
                }
                elseif ($pluviometro_id == 5) { //2018-nazare-02
                    $accessToken = 'hZeVfAKPljYp64hqv0Ps';
                }
                elseif ($pluviometro_id == 6) { //2018-nazare-03
                    $accessToken = 'qmO4NG9zlvD2Lfh0mv35';
                }
                elseif ($pluviometro_id == 7) { //2010-pesqueira-01
                    $accessToken = 'bMuYRLsZYdmYLH7r9ffn';
                }
                elseif ($pluviometro_id == 8) { //2010-pesqueira-02
                    $accessToken = '9T1kZYZbOBFR4N6WuNS3';
                }
                elseif ($pluviometro_id == 9) { //2010-pesqueira-03
                    $accessToken = 'RVy07yNmthyOCwB3TxMj';
                }
                elseif ($pluviometro_id == 10) { //2010-pesqueira-05
                    $accessToken = '0DA55o8heeF1OhyWXkcF';
                }
                elseif ($pluviometro_id == 11) { //2010-pesqueira-06
                    $accessToken = 'HUnK7qrPBp1wrCypNCoE';
                }
                elseif ($pluviometro_id == 12) { //2010-pesqueira-07
                    $accessToken = 'PmkbnQZFiLp83vLhCR5I';
                }
                elseif ($pluviometro_id == 14) { //2010-pesqueira-08
                    $accessToken = 'rB0AaCzp8iiZ5jcUd5zz';
                }
                elseif ($pluviometro_id == 15) { //2014-automático-01
                    $accessToken = 'lzuBGSo7WiyAaj18dNhA';
                }
                elseif ($pluviometro_id == 16) { //2014-automático-02
                    $accessToken = '7FAx9ajKTxPpq3uFiUWd';
                }
                elseif ($pluviometro_id == 17) { //2014-automático-03
                    $accessToken = 'uSdE3o1NEKRyfYuMpEAE';
                }
                elseif ($pluviometro_id == 18) { //2014-automático-04
                    $accessToken = '6UxSi49B5tBpgC0APuHV';
                }
                elseif ($pluviometro_id == 19) { //2014-automático-05
                    $accessToken = 'h3Tpm5IK43sBCNwgWgHx';
                }
                elseif ($pluviometro_id == 20) { //2014-automático-06
                    $accessToken = 'TZUnIEVmN3GM06qHj84U';
                }

                $dateHour = $data.' '.$hora;
                $timestamp = strtotime($dateHour); 
                $timestamp = $timestamp*1000;

                $url = 'http://172.16.68.21:8080/api/v1/'.$accessToken.'/telemetry';
                $client = new Client(); //GuzzleHttp\Client
                $result = $client->request('POST',$url, ['json' => ['ts' => $timestamp, 
                    'values' => ['lamina' => $pluviometrias->lamina]]
                ]);



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

        $record = DB::table('usuario_pluviometro')
                ->where([
                    ['usuario_id', '=', $request->user_id],
                    ['pluviometro_id', '=', $request->pluviometro_id]
                ])->get();

        if(!$record->isEmpty()){
            return redirect()->back()->with('message2', 'O usuário já possui acesso a este pluviometro!');
        }

        DB::table('usuario_pluviometro')->insert(
            ['usuario_id' => $request->user_id, 'pluviometro_id' => $request->pluviometro_id]
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

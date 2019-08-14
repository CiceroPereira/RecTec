<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pluviometria;
use App\Models\Pluviometro;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Pluviometria::all();

        return response()->json($all);
    }

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
       // $pluviometria = Pluviometria::create($request->all());
        $pluviometria = new Pluviometria;

        $pluviometria->lamina = $request->lamina;
        $pluviometria->user_id = $request->user_id;
        $pluviometria->pluviometro_id = $request->pluviometro_id;

        $hora = date('H:i');
        $date = date('Y/m/d');

        DB::table('pluviometrias')->insert(
            ['data' => $date, 'hora' => $hora, 'lamina' => $pluviometria->lamina,
            'user_id' => $pluviometria->user_id, 'pluviometro_id' => $pluviometria->pluviometro_id ]
        );

        return response()->json($pluviometria, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pluviometria::findOrFail($id);

        return response()->json($data);
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
        $dado = Pluviometria::findOrFail($id);
        $dado->delete();

        return back()->with(['success' => 'Dado deletado com sucesso']);

    }

    public function getHour(){

        $hora = date('H:i');

        return response()->json($hora);
    }

    public function allPluviometers(){

        $all = Pluviometro::all();

        return response()->json($all);
    }


    public function getMedByPluvId($id){

        $all = DB::table('pluviometrias')->where('pluviometro_id', '=', $id)->get();

        return response()->json($all);

    }

    public function things(){

            set_time_limit(0);
            $accessToken = '';
            $all = Pluviometria::all();

            foreach ($all as $pluviometrias) {
                
                if($pluviometrias->pluviometro_id == 1){ //2018-prae-01
                    $accessToken = 'vOmwtG6lDLjle11arv8L';
                }
                elseif ($pluviometrias->pluviometro_id == 2) { //2018-prae-02
                    $accessToken = '12yzaUftpb0e5jKyGTq6';
                }
                elseif ($pluviometrias->pluviometro_id == 3) { //2018-dois-irmaos-01
                    $accessToken = 'goGguuGHKCpurEXy1dlN';
                }
                elseif ($pluviometrias->pluviometro_id == 4) { //2018-nazare-01
                    $accessToken = 'vdCTGPJwZJi7AwoV4iR5';
                }
                elseif ($pluviometrias->pluviometro_id == 5) { //2018-nazare-02
                    $accessToken = 'hZeVfAKPljYp64hqv0Ps';
                }
                elseif ($pluviometrias->pluviometro_id == 6) { //2018-nazare-03
                    $accessToken = 'qmO4NG9zlvD2Lfh0mv35';
                }
                elseif ($pluviometrias->pluviometro_id == 7) { //2010-pesqueira-01
                    $accessToken = 'bMuYRLsZYdmYLH7r9ffn';
                }
                elseif ($pluviometrias->pluviometro_id == 8) { //2010-pesqueira-02
                    $accessToken = '9T1kZYZbOBFR4N6WuNS3';
                }
                elseif ($pluviometrias->pluviometro_id == 9) { //2010-pesqueira-03
                    $accessToken = 'RVy07yNmthyOCwB3TxMj';
                }
                elseif ($pluviometrias->pluviometro_id == 10) { //2010-pesqueira-05
                    $accessToken = '0DA55o8heeF1OhyWXkcF';
                }
                elseif ($pluviometrias->pluviometro_id == 11) { //2010-pesqueira-06
                    $accessToken = 'HUnK7qrPBp1wrCypNCoE';
                }
                elseif ($pluviometrias->pluviometro_id == 12) { //2010-pesqueira-07
                    $accessToken = 'PmkbnQZFiLp83vLhCR5I';
                }
                elseif ($pluviometrias->pluviometro_id == 14) { //2010-pesqueira-08
                    $accessToken = 'rB0AaCzp8iiZ5jcUd5zz';
                }
                elseif ($pluviometrias->pluviometro_id == 15) { //2014-automático-01
                    $accessToken = 'lzuBGSo7WiyAaj18dNhA';
                }
                elseif ($pluviometrias->pluviometro_id == 16) { //2014-automático-02
                    $accessToken = '7FAx9ajKTxPpq3uFiUWd';
                }
                elseif ($pluviometrias->pluviometro_id == 17) { //2014-automático-03
                    $accessToken = 'uSdE3o1NEKRyfYuMpEAE';
                }
                elseif ($pluviometrias->pluviometro_id == 18) { //2014-automático-04
                    $accessToken = '6UxSi49B5tBpgC0APuHV';
                }
                elseif ($pluviometrias->pluviometro_id == 19) { //2014-automático-05
                    $accessToken = 'h3Tpm5IK43sBCNwgWgHx';
                }
                elseif ($pluviometrias->pluviometro_id == 20) { //2014-automático-06
                    $accessToken = 'TZUnIEVmN3GM06qHj84U';
                }

                $data = $pluviometrias->data.' '.$pluviometrias->hora;
                $timestamp = strtotime($data); 
                $timestamp = $timestamp*1000;

                $url = 'http://172.16.68.21:8080/api/v1'.$accessToken.'/telemetry';
                $client = new Client(); //GuzzleHttp\Client
                $result = $client->request('POST',$url, ['json' => ['ts' => $timestamp, 
                    'values' => ['lamina' => $pluviometrias->lamina]]
                ]);
            }

            
    }
}

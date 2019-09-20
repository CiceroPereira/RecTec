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
                elseif ($pluviometro_id == 21) { //2019-goiana-260620001V-28
                    $accessToken = 'Fyjbru0MZnaCqRA7C1LR';
                }
                elseif ($pluviometro_id == 22) { //2019-moreno-260940201V-205
                    $accessToken = 'deWt6517y0HIsmKrndht';
                }
                elseif ($pluviometro_id == 23) { //2019-agua-preta-260040101V-80
                    $accessToken = 'vBTFYwpgVgn4ftMsR0He';
                }
                elseif ($pluviometro_id == 24) { //2019-amaraji-260090601V-105
                    $accessToken = 'CH1ZIAZbNAr5x0wK2lVH';
                }
                elseif ($pluviometro_id == 25) { //2019-barreiros-260140901V-106
                    $accessToken = '18sJ91frX9DQmbgDIw21';
                }
                elseif ($pluviometro_id == 26) { //2019-buenos-aires-260270401V-96
                    $accessToken = 'WL7hT7JAcb3fi3gBFeOk';
                }
                elseif ($pluviometro_id == 27) { //2019-camutanga-260360302V-514
                    $accessToken = 'm2kH0NiHU4ORExY50qcz';
                }
                elseif ($pluviometro_id == 28) { //2019-catende-260420503V-527
                    $accessToken = '7nREgVi6VkPDaNK9MyHV';
                }
                elseif ($pluviometro_id == 29) { //2019-cha-grande-260450201V-117
                    $accessToken = 'yebHEh5VH8b45stkRFxh';
                }
                elseif ($pluviometro_id == 30) { //2019-condado-260460101V-131
                    $accessToken = 'dcyUtJVfAOR1USKYELdR';
                }
                elseif ($pluviometro_id == 31) { //2019-cortes-260480902A
                    $accessToken = 'xsFhmw7kBTvYFlU4Hqsy';
                }
                elseif ($pluviometro_id == 32) { //2019-ferreiros-260550901V-457
                    $accessToken = 'dMvqrdDwYDwolf86HOiv';
                }
                elseif ($pluviometro_id == 33) { //2019-gloria-goita-260610101V-136
                    $accessToken = 'pKVwZwkOFWr83GtGQQla';
                }
                elseif ($pluviometro_id == 34) { //2019-itambe-260765302V-27
                    $accessToken = 'gDdmTnL77WJN91rFGNO8';
                }
                elseif ($pluviometro_id == 35) { //2019-itaquitinga-260780201V-101
                    $accessToken = '1q53xSjoG3gDK5GP3jwa';
                }
                elseif ($pluviometro_id == 36) { //2019-jaqueira-260795002V-508
                    $accessToken = 'cDMjoGvVgH184fWZ8ZuE';
                }
                elseif ($pluviometro_id == 37) { //2019-joaquim-nabuco-260590501V-285
                    $accessToken = '3aFdQt3K7nOUaDnic3ti';
                }
                elseif ($pluviometro_id == 38) { //2019-lagoa-do-cano-260845301V-204
                    $accessToken = 'jYLBfrmXrrTuMa6Ud6f5';
                }
                elseif ($pluviometro_id == 39) { //2019-macaparana-260900601V-94
                    $accessToken = 'Iar0hZMnWjRjVlgmjoX0';
                }
                elseif ($pluviometro_id == 40) { //2019-miraial-260795001V-316
                    $accessToken = 'Iar0hZMnWjRjVlgmjoX0';
                }
                elseif ($pluviometro_id == 41) { //2019-nazare-mata-260950101V-97
                    $accessToken = '4mX4ELIWPQxmyf4Qob0v';
                }
                elseif ($pluviometro_id == 42) { //2019-palmares-261000401V-25
                    $accessToken = 'JgMnOO1o8g6FleZTS2Z6';
                }
                elseif ($pluviometro_id == 43) { //2019-paudalho-261060801V-98
                    $accessToken = '11PzY9TGZene9hzVIWQY';
                }
                elseif ($pluviometro_id == 44) { //2019-pombos-261130901V-127
                    $accessToken = '27q2GUp9zDj2qyHylynI';
                }
                elseif ($pluviometro_id == 45) { //2019-quipapa-261150703V-525
                    $accessToken = 'OGOIuwiIY1GwhKGi3lCx';
                }
                elseif ($pluviometro_id == 46) { //2019-sao-bernadito-sul-260870102V-188
                    $accessToken = 'tzwdykf5qsauvAmr9CWk';
                }
                elseif ($pluviometro_id == 47) { //2019-saojose-coroagrande-261340401V-110
                    $accessToken = 'Oyza2Pnn2qTm4zmRcTdd';
                }
                elseif ($pluviometro_id == 48) { //2019-sirinhaem-261420401V-111
                    $accessToken = 'IqVcIXJN8i6pSoRK47jg';
                }
                elseif ($pluviometro_id == 49) { //2019-tamandare-261485701V-510
                    $accessToken = 't8KdEEVZfNtldWsqnisL';
                }
                elseif ($pluviometro_id == 50) { //2019-timbauba-261530001V-99
                    $accessToken = 'cv8PjZhIfiEXM1hXhZyw';
                }
                elseif ($pluviometro_id == 51) { //2019-tracunhaem-261550801V-515
                    $accessToken = '5qCf4ZKzzAdKf7iijHd1';
                }
                elseif ($pluviometro_id == 52) { //2019-vicencia-261630801V-134
                    $accessToken = 'gR5wqrSRkfEEG68WSJ3W';
                }
                elseif ($pluviometro_id == 53) { //2019-vitoria-sto-antao-261640701V-26
                    $accessToken = 'Rab71i2jeN8gJA7r0Rao';
                }

                $dateHour = $data.' '.$hora;
                $timestamp = strtotime($dateHour); 
                $timestamp = $timestamp*1000;

                $url = 'http://172.16.68.21:8080/api/v1/'.$accessToken.'/telemetry';
                $client = new Client(); //GuzzleHttp\Client
                $result = $client->request('POST',$url, ['json' => ['ts' => $timestamp, 
                    'values' => ['lamina' => $lamina]]
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

        if($dado->pluviometro_id == 1){ //2018-prae-01
                    $accessToken = 'vOmwtG6lDLjle11arv8L';
                }
                elseif ($dado->pluviometro_id == 2) { //2018-prae-02
                    $accessToken = '12yzaUftpb0e5jKyGTq6';
                }
                elseif ($dado->pluviometro_id == 3) { //2018-dois-irmaos-01
                    $accessToken = 'goGguuGHKCpurEXy1dlN';
                }
                elseif ($dado->pluviometro_id == 4) { //2018-nazare-01
                    $accessToken = 'vdCTGPJwZJi7AwoV4iR5';
                }
                elseif ($dado->pluviometro_id == 5) { //2018-nazare-02
                    $accessToken = 'hZeVfAKPljYp64hqv0Ps';
                }
                elseif ($dado->pluviometro_id == 6) { //2018-nazare-03
                    $accessToken = 'qmO4NG9zlvD2Lfh0mv35';
                }
                elseif ($dado->pluviometro_id == 7) { //2010-pesqueira-01
                    $accessToken = 'bMuYRLsZYdmYLH7r9ffn';
                }
                elseif ($dado->pluviometro_id == 8) { //2010-pesqueira-02
                    $accessToken = '9T1kZYZbOBFR4N6WuNS3';
                }
                elseif ($dado->pluviometro_id == 9) { //2010-pesqueira-03
                    $accessToken = 'RVy07yNmthyOCwB3TxMj';
                }
                elseif ($dado->pluviometro_id == 10) { //2010-pesqueira-05
                    $accessToken = '0DA55o8heeF1OhyWXkcF';
                }
                elseif ($dado->pluviometro_id == 11) { //2010-pesqueira-06
                    $accessToken = 'HUnK7qrPBp1wrCypNCoE';
                }
                elseif ($dado->pluviometro_id == 12) { //2010-pesqueira-07
                    $accessToken = 'PmkbnQZFiLp83vLhCR5I';
                }
                elseif ($dado->pluviometro_id == 14) { //2010-pesqueira-08
                    $accessToken = 'rB0AaCzp8iiZ5jcUd5zz';
                }
                elseif ($dado->pluviometro_id == 15) { //2014-automático-01
                    $accessToken = 'lzuBGSo7WiyAaj18dNhA';
                }
                elseif ($dado->pluviometro_id == 16) { //2014-automático-02
                    $accessToken = '7FAx9ajKTxPpq3uFiUWd';
                }
                elseif ($dado->pluviometro_id == 17) { //2014-automático-03
                    $accessToken = 'uSdE3o1NEKRyfYuMpEAE';
                }
                elseif ($dado->pluviometro_id == 18) { //2014-automático-04
                    $accessToken = '6UxSi49B5tBpgC0APuHV';
                }
                elseif ($dado->pluviometro_id == 19) { //2014-automático-05
                    $accessToken = 'h3Tpm5IK43sBCNwgWgHx';
                }
                elseif ($dado->pluviometro_id == 20) { //2014-automático-06
                    $accessToken = 'TZUnIEVmN3GM06qHj84U';
                }
                elseif ($pluviometro_id == 21) { //2019-goiana-260620001V-28
                    $accessToken = 'Fyjbru0MZnaCqRA7C1LR';
                }
                elseif ($pluviometro_id == 22) { //2019-moreno-260940201V-205
                    $accessToken = 'deWt6517y0HIsmKrndht';
                }
                elseif ($pluviometro_id == 23) { //2019-agua-preta-260040101V-80
                    $accessToken = 'vBTFYwpgVgn4ftMsR0He';
                }
                elseif ($pluviometro_id == 24) { //2019-amaraji-260090601V-105
                    $accessToken = 'CH1ZIAZbNAr5x0wK2lVH';
                }
                elseif ($pluviometro_id == 25) { //2019-barreiros-260140901V-106
                    $accessToken = '18sJ91frX9DQmbgDIw21';
                }
                elseif ($pluviometro_id == 26) { //2019-buenos-aires-260270401V-96
                    $accessToken = 'WL7hT7JAcb3fi3gBFeOk';
                }
                elseif ($pluviometro_id == 27) { //2019-camutanga-260360302V-514
                    $accessToken = 'm2kH0NiHU4ORExY50qcz';
                }
                elseif ($pluviometro_id == 28) { //2019-catende-260420503V-527
                    $accessToken = '7nREgVi6VkPDaNK9MyHV';
                }
                elseif ($pluviometro_id == 29) { //2019-cha-grande-260450201V-117
                    $accessToken = 'yebHEh5VH8b45stkRFxh';
                }
                elseif ($pluviometro_id == 30) { //2019-condado-260460101V-131
                    $accessToken = 'dcyUtJVfAOR1USKYELdR';
                }
                elseif ($pluviometro_id == 31) { //2019-cortes-260480902A
                    $accessToken = 'xsFhmw7kBTvYFlU4Hqsy';
                }
                elseif ($pluviometro_id == 32) { //2019-ferreiros-260550901V-457
                    $accessToken = 'dMvqrdDwYDwolf86HOiv';
                }
                elseif ($pluviometro_id == 33) { //2019-gloria-goita-260610101V-136
                    $accessToken = 'pKVwZwkOFWr83GtGQQla';
                }
                elseif ($pluviometro_id == 34) { //2019-itambe-260765302V-27
                    $accessToken = 'gDdmTnL77WJN91rFGNO8';
                }
                elseif ($pluviometro_id == 35) { //2019-itaquitinga-260780201V-101
                    $accessToken = '1q53xSjoG3gDK5GP3jwa';
                }
                elseif ($pluviometro_id == 36) { //2019-jaqueira-260795002V-508
                    $accessToken = 'cDMjoGvVgH184fWZ8ZuE';
                }
                elseif ($pluviometro_id == 37) { //2019-joaquim-nabuco-260590501V-285
                    $accessToken = '3aFdQt3K7nOUaDnic3ti';
                }
                elseif ($pluviometro_id == 38) { //2019-lagoa-do-cano-260845301V-204
                    $accessToken = 'jYLBfrmXrrTuMa6Ud6f5';
                }
                elseif ($pluviometro_id == 39) { //2019-macaparana-260900601V-94
                    $accessToken = 'Iar0hZMnWjRjVlgmjoX0';
                }
                elseif ($pluviometro_id == 40) { //2019-miraial-260795001V-316
                    $accessToken = 'Iar0hZMnWjRjVlgmjoX0';
                }
                elseif ($pluviometro_id == 41) { //2019-nazare-mata-260950101V-97
                    $accessToken = '4mX4ELIWPQxmyf4Qob0v';
                }
                elseif ($pluviometro_id == 42) { //2019-palmares-261000401V-25
                    $accessToken = 'JgMnOO1o8g6FleZTS2Z6';
                }
                elseif ($pluviometro_id == 43) { //2019-paudalho-261060801V-98
                    $accessToken = '11PzY9TGZene9hzVIWQY';
                }
                elseif ($pluviometro_id == 44) { //2019-pombos-261130901V-127
                    $accessToken = '27q2GUp9zDj2qyHylynI';
                }
                elseif ($pluviometro_id == 45) { //2019-quipapa-261150703V-525
                    $accessToken = 'OGOIuwiIY1GwhKGi3lCx';
                }
                elseif ($pluviometro_id == 46) { //2019-sao-bernadito-sul-260870102V-188
                    $accessToken = 'tzwdykf5qsauvAmr9CWk';
                }
                elseif ($pluviometro_id == 47) { //2019-saojose-coroagrande-261340401V-110
                    $accessToken = 'Oyza2Pnn2qTm4zmRcTdd';
                }
                elseif ($pluviometro_id == 48) { //2019-sirinhaem-261420401V-111
                    $accessToken = 'IqVcIXJN8i6pSoRK47jg';
                }
                elseif ($pluviometro_id == 49) { //2019-tamandare-261485701V-510
                    $accessToken = 't8KdEEVZfNtldWsqnisL';
                }
                elseif ($pluviometro_id == 50) { //2019-timbauba-261530001V-99
                    $accessToken = 'cv8PjZhIfiEXM1hXhZyw';
                }
                elseif ($pluviometro_id == 51) { //2019-tracunhaem-261550801V-515
                    $accessToken = '5qCf4ZKzzAdKf7iijHd1';
                }
                elseif ($pluviometro_id == 52) { //2019-vicencia-261630801V-134
                    $accessToken = 'gR5wqrSRkfEEG68WSJ3W';
                }
                elseif ($pluviometro_id == 53) { //2019-vitoria-sto-antao-261640701V-26
                    $accessToken = 'Rab71i2jeN8gJA7r0Rao';
                }

                $dateHour = $dado->data.' '.$dado->hora;
                $timestamp = strtotime($dateHour); 
                $timestamp = $timestamp*1000;

                $url = 'http://172.16.68.21:8080/api/v1/'.$accessToken.'/telemetry';
                $client = new Client(); //GuzzleHttp\Client
                $result = $client->request('POST',$url, ['json' => ['ts' => $timestamp, 
                    'values' => ['lamina' => $dado->lamina]]
                ]);
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

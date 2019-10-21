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
                    $accessToken = 'TyzUlPJD4gjYwsRft1Tl';
                }
                elseif ($pluviometro_id == 2) { //2018-prae-02
                    $accessToken = '6ElibN3BfIyX5nSyQNYD';
                }
                elseif ($pluviometro_id == 3) { //2018-dois-irmaos-01
                    $accessToken = 'SABb2t9VDC5CeV7iYFHm';
                }
                elseif ($pluviometro_id == 4) { //2018-nazare-01
                    $accessToken = 'o8QVaSQSM8O6u0XTUqFs';
                }
                elseif ($pluviometro_id == 5) { //2018-nazare-02
                    $accessToken = '6ZjjN3oWpdFyoTOy6WRB';
                }
                elseif ($pluviometro_id == 6) { //2018-nazare-03
                    $accessToken = 'hV5mL50aIQS1E98HgZoo';
                }
                elseif ($pluviometro_id == 7) { //2010-pesqueira-01
                    $accessToken = '5IzNBo6XqM5b0A4DdkxK';
                }
                elseif ($pluviometro_id == 8) { //2010-pesqueira-02
                    $accessToken = 'fNOH1kB7B4dTGOA9RnEW';
                }
                elseif ($pluviometro_id == 9) { //2010-pesqueira-03
                    $accessToken = 'Y7z205hkwCkj0HsVdbbx';
                }
                elseif ($pluviometro_id == 10) { //2010-pesqueira-05
                    $accessToken = 's5bcHpF2QnvfhrpJ3xOJ';
                }
                elseif ($pluviometro_id == 11) { //2010-pesqueira-06
                    $accessToken = 'uQfLhQl95IvSEQpJGe2l';
                }
                elseif ($pluviometro_id == 12) { //2010-pesqueira-07
                    $accessToken = 'VaXeoEIhPTNkyo3q6shA';
                }
                elseif ($pluviometro_id == 14) { //2010-pesqueira-08
                    $accessToken = 'Ns8jTngQTa71TO7Fzuky';
                }
                elseif ($pluviometro_id == 15) { //2014-automático-01
                    $accessToken = 'nkNc6SuV2odQP5UFb92y';
                }
                elseif ($pluviometro_id == 16) { //2014-automático-02
                    $accessToken = '0VX5mbMOFOsxONinunYL';
                }
                elseif ($pluviometro_id == 17) { //2014-automático-03
                    $accessToken = 'Jm3SyIVb7y684GBOh97o';
                }
                elseif ($pluviometro_id == 18) { //2014-automático-04
                    $accessToken = 'IUAhmHwqaFwkG0h2WFX2';
                }
                elseif ($pluviometro_id == 19) { //2014-automático-05
                    $accessToken = 'SEqz9rILn1p91Mlsdaum';
                }
                elseif ($pluviometro_id == 20) { //2014-automático-06
                    $accessToken = 'mYgQAZMo3A0T9pf4pvoL';
                }
                elseif ($pluviometro_id == 21) { //2019-goiana-260620001V-28
                    $accessToken = 'tV7dPHTY6Jt46JaDiUM6';
                }
                elseif ($pluviometro_id == 22) { //2019-moreno-260940201V-205
                    $accessToken = 'UlfDLFWhcncBgU906LKm';
                }
                elseif ($pluviometro_id == 23) { //2019-agua-preta-260040101V-80
                    $accessToken = 'RRmz2lIYpd84qc9O7hgy';
                }
                elseif ($pluviometro_id == 24) { //2019-amaraji-260090601V-105
                    $accessToken = '7RMYVhd4OGb8mqQHfCnH';
                }
                elseif ($pluviometro_id == 25) { //2019-barreiros-260140901V-106
                    $accessToken = 'SDprNke8qWtAp2s9BNRa';
                }
                elseif ($pluviometro_id == 26) { //2019-buenos-aires-260270401V-96
                    $accessToken = 'oNWt0IqfPwS6BeDTGfu0';
                }
                elseif ($pluviometro_id == 27) { //2019-camutanga-260360302V-514
                    $accessToken = 'P5Eb70Cikmwq0WPKfN0J';
                }
                elseif ($pluviometro_id == 28) { //2019-catende-260420503V-527
                    $accessToken = 'wXWgxSCd4Ik1EVH3zbaF';
                }
                elseif ($pluviometro_id == 29) { //2019-cha-grande-260450201V-117
                    $accessToken = '9s6WA3OaStkny3KMP1wy';
                }
                elseif ($pluviometro_id == 30) { //2019-condado-260460101V-131
                    $accessToken = 'egPkP6Xt0ECYu0DtvVdk';
                }
                elseif ($pluviometro_id == 31) { //2019-cortes-260480902A
                    $accessToken = 'bGSdVhPTDnRyKODBDkLI';
                }
                elseif ($pluviometro_id == 32) { //2019-ferreiros-260550901V-457
                    $accessToken = 'kcXwAwkqgXDmdzmG1fP8';
                }
                elseif ($pluviometro_id == 33) { //2019-gloria-goita-260610101V-136
                    $accessToken = '9o6qK7VqZ3PCFjao9EjA';
                }
                elseif ($pluviometro_id == 34) { //2019-itambe-260765302V-27
                    $accessToken = 'MrNqfFcBgRPZl0HEVmzc';
                }
                elseif ($pluviometro_id == 35) { //2019-itaquitinga-260780201V-101
                    $accessToken = '4joGOxQWKTRceiZZnOin';
                }
                elseif ($pluviometro_id == 36) { //2019-jaqueira-260795002V-508
                    $accessToken = 'GRozj0YIQf9H6LeQ61Ri';
                }
                elseif ($pluviometro_id == 37) { //2019-joaquim-nabuco-260590501V-285
                    $accessToken = 'uvmc1QjQ8gg1geCJ09hk';
                }
                elseif ($pluviometro_id == 38) { //2019-lagoa-do-cano-260845301V-204
                    $accessToken = 'XzNswVcJ0LdP7plwyc8T';
                }
                elseif ($pluviometro_id == 39) { //2019-macaparana-260900601V-94
                    $accessToken = 'ryy84RRijGwzanje1zLS';
                }
                elseif ($pluviometro_id == 40) { //2019-miraial-260795001V-316
                    $accessToken = 'IETwgjsPyrkfbyHDyiq2';
                }
                elseif ($pluviometro_id == 41) { //2019-nazare-mata-260950101V-97
                    $accessToken = 'WA16Nttq6q5RGh4kRf6Z';
                }
                elseif ($pluviometro_id == 42) { //2019-palmares-261000401V-25
                    $accessToken = 'O0AglindXDeLV0IflPmI';
                }
                elseif ($pluviometro_id == 43) { //2019-paudalho-261060801V-98
                    $accessToken = 'g2143UDj5u19q4enw449';
                }
                elseif ($pluviometro_id == 44) { //2019-pombos-261130901V-127
                    $accessToken = 'lzdOztSUsW2ehMIyIPpW';
                }
                elseif ($pluviometro_id == 45) { //2019-quipapa-261150703V-525
                    $accessToken = '5SgQq123sgVlX0wDsUO7';
                }
                elseif ($pluviometro_id == 46) { //2019-sao-bernadito-sul-260870102V-188
                    $accessToken = 'lSbdusDbFoiFhrMPYeoI';
                }
                elseif ($pluviometro_id == 47) { //2019-saojose-coroagrande-261340401V-110
                    $accessToken = 'c3VpMq8qfXlqvsZu5P2p';
                }
                elseif ($pluviometro_id == 48) { //2019-sirinhaem-261420401V-111
                    $accessToken = 'xhMKk9MD9ApJ9zsDZiy0';
                }
                elseif ($pluviometro_id == 49) { //2019-tamandare-261485701V-510
                    $accessToken = 'XJh07FYLDNgRHZmqvVoD';
                }
                elseif ($pluviometro_id == 50) { //2019-timbauba-261530001V-99
                    $accessToken = 'WDQ4jfwN4xrJGpVCv0C7';
                }
                elseif ($pluviometro_id == 51) { //2019-tracunhaem-261550801V-515
                    $accessToken = '9TkN6jGCnCVk80eoxyHj';
                }
                elseif ($pluviometro_id == 52) { //2019-vicencia-261630801V-134
                    $accessToken = 'FY1k3f0ISgxYghtAfWJO';
                }
                elseif ($pluviometro_id == 53) { //2019-vitoria-sto-antao-261640701V-26
                    $accessToken = 'x68gM4mY8WiRj9LUecTi';
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
                    $accessToken = 'TyzUlPJD4gjYwsRft1Tl';
                }
                elseif ($pluviometro_id == 2) { //2018-prae-02
                    $accessToken = '6ElibN3BfIyX5nSyQNYD';
                }
                elseif ($pluviometro_id == 3) { //2018-dois-irmaos-01
                    $accessToken = 'SABb2t9VDC5CeV7iYFHm';
                }
                elseif ($pluviometro_id == 4) { //2018-nazare-01
                    $accessToken = 'o8QVaSQSM8O6u0XTUqFs';
                }
                elseif ($pluviometro_id == 5) { //2018-nazare-02
                    $accessToken = '6ZjjN3oWpdFyoTOy6WRB';
                }
                elseif ($pluviometro_id == 6) { //2018-nazare-03
                    $accessToken = 'hV5mL50aIQS1E98HgZoo';
                }
                elseif ($pluviometro_id == 7) { //2010-pesqueira-01
                    $accessToken = '5IzNBo6XqM5b0A4DdkxK';
                }
                elseif ($pluviometro_id == 8) { //2010-pesqueira-02
                    $accessToken = 'fNOH1kB7B4dTGOA9RnEW';
                }
                elseif ($pluviometro_id == 9) { //2010-pesqueira-03
                    $accessToken = 'Y7z205hkwCkj0HsVdbbx';
                }
                elseif ($pluviometro_id == 10) { //2010-pesqueira-05
                    $accessToken = 's5bcHpF2QnvfhrpJ3xOJ';
                }
                elseif ($pluviometro_id == 11) { //2010-pesqueira-06
                    $accessToken = 'uQfLhQl95IvSEQpJGe2l';
                }
                elseif ($pluviometro_id == 12) { //2010-pesqueira-07
                    $accessToken = 'VaXeoEIhPTNkyo3q6shA';
                }
                elseif ($pluviometro_id == 14) { //2010-pesqueira-08
                    $accessToken = 'Ns8jTngQTa71TO7Fzuky';
                }
                elseif ($pluviometro_id == 15) { //2014-automático-01
                    $accessToken = 'nkNc6SuV2odQP5UFb92y';
                }
                elseif ($pluviometro_id == 16) { //2014-automático-02
                    $accessToken = '0VX5mbMOFOsxONinunYL';
                }
                elseif ($pluviometro_id == 17) { //2014-automático-03
                    $accessToken = 'Jm3SyIVb7y684GBOh97o';
                }
                elseif ($pluviometro_id == 18) { //2014-automático-04
                    $accessToken = 'IUAhmHwqaFwkG0h2WFX2';
                }
                elseif ($pluviometro_id == 19) { //2014-automático-05
                    $accessToken = 'SEqz9rILn1p91Mlsdaum';
                }
                elseif ($pluviometro_id == 20) { //2014-automático-06
                    $accessToken = 'mYgQAZMo3A0T9pf4pvoL';
                }
                elseif ($pluviometro_id == 21) { //2019-goiana-260620001V-28
                    $accessToken = 'tV7dPHTY6Jt46JaDiUM6';
                }
                elseif ($pluviometro_id == 22) { //2019-moreno-260940201V-205
                    $accessToken = 'UlfDLFWhcncBgU906LKm';
                }
                elseif ($pluviometro_id == 23) { //2019-agua-preta-260040101V-80
                    $accessToken = 'RRmz2lIYpd84qc9O7hgy';
                }
                elseif ($pluviometro_id == 24) { //2019-amaraji-260090601V-105
                    $accessToken = '7RMYVhd4OGb8mqQHfCnH';
                }
                elseif ($pluviometro_id == 25) { //2019-barreiros-260140901V-106
                    $accessToken = 'SDprNke8qWtAp2s9BNRa';
                }
                elseif ($pluviometro_id == 26) { //2019-buenos-aires-260270401V-96
                    $accessToken = 'oNWt0IqfPwS6BeDTGfu0';
                }
                elseif ($pluviometro_id == 27) { //2019-camutanga-260360302V-514
                    $accessToken = 'P5Eb70Cikmwq0WPKfN0J';
                }
                elseif ($pluviometro_id == 28) { //2019-catende-260420503V-527
                    $accessToken = 'wXWgxSCd4Ik1EVH3zbaF';
                }
                elseif ($pluviometro_id == 29) { //2019-cha-grande-260450201V-117
                    $accessToken = '9s6WA3OaStkny3KMP1wy';
                }
                elseif ($pluviometro_id == 30) { //2019-condado-260460101V-131
                    $accessToken = 'egPkP6Xt0ECYu0DtvVdk';
                }
                elseif ($pluviometro_id == 31) { //2019-cortes-260480902A
                    $accessToken = 'bGSdVhPTDnRyKODBDkLI';
                }
                elseif ($pluviometro_id == 32) { //2019-ferreiros-260550901V-457
                    $accessToken = 'kcXwAwkqgXDmdzmG1fP8';
                }
                elseif ($pluviometro_id == 33) { //2019-gloria-goita-260610101V-136
                    $accessToken = '9o6qK7VqZ3PCFjao9EjA';
                }
                elseif ($pluviometro_id == 34) { //2019-itambe-260765302V-27
                    $accessToken = 'MrNqfFcBgRPZl0HEVmzc';
                }
                elseif ($pluviometro_id == 35) { //2019-itaquitinga-260780201V-101
                    $accessToken = '4joGOxQWKTRceiZZnOin';
                }
                elseif ($pluviometro_id == 36) { //2019-jaqueira-260795002V-508
                    $accessToken = 'GRozj0YIQf9H6LeQ61Ri';
                }
                elseif ($pluviometro_id == 37) { //2019-joaquim-nabuco-260590501V-285
                    $accessToken = 'uvmc1QjQ8gg1geCJ09hk';
                }
                elseif ($pluviometro_id == 38) { //2019-lagoa-do-cano-260845301V-204
                    $accessToken = 'XzNswVcJ0LdP7plwyc8T';
                }
                elseif ($pluviometro_id == 39) { //2019-macaparana-260900601V-94
                    $accessToken = 'ryy84RRijGwzanje1zLS';
                }
                elseif ($pluviometro_id == 40) { //2019-miraial-260795001V-316
                    $accessToken = 'IETwgjsPyrkfbyHDyiq2';
                }
                elseif ($pluviometro_id == 41) { //2019-nazare-mata-260950101V-97
                    $accessToken = 'WA16Nttq6q5RGh4kRf6Z';
                }
                elseif ($pluviometro_id == 42) { //2019-palmares-261000401V-25
                    $accessToken = 'O0AglindXDeLV0IflPmI';
                }
                elseif ($pluviometro_id == 43) { //2019-paudalho-261060801V-98
                    $accessToken = 'g2143UDj5u19q4enw449';
                }
                elseif ($pluviometro_id == 44) { //2019-pombos-261130901V-127
                    $accessToken = 'lzdOztSUsW2ehMIyIPpW';
                }
                elseif ($pluviometro_id == 45) { //2019-quipapa-261150703V-525
                    $accessToken = '5SgQq123sgVlX0wDsUO7';
                }
                elseif ($pluviometro_id == 46) { //2019-sao-bernadito-sul-260870102V-188
                    $accessToken = 'lSbdusDbFoiFhrMPYeoI';
                }
                elseif ($pluviometro_id == 47) { //2019-saojose-coroagrande-261340401V-110
                    $accessToken = 'c3VpMq8qfXlqvsZu5P2p';
                }
                elseif ($pluviometro_id == 48) { //2019-sirinhaem-261420401V-111
                    $accessToken = 'xhMKk9MD9ApJ9zsDZiy0';
                }
                elseif ($pluviometro_id == 49) { //2019-tamandare-261485701V-510
                    $accessToken = 'XJh07FYLDNgRHZmqvVoD';
                }
                elseif ($pluviometro_id == 50) { //2019-timbauba-261530001V-99
                    $accessToken = 'WDQ4jfwN4xrJGpVCv0C7';
                }
                elseif ($pluviometro_id == 51) { //2019-tracunhaem-261550801V-515
                    $accessToken = '9TkN6jGCnCVk80eoxyHj';
                }
                elseif ($pluviometro_id == 52) { //2019-vicencia-261630801V-134
                    $accessToken = 'FY1k3f0ISgxYghtAfWJO';
                }
                elseif ($pluviometro_id == 53) { //2019-vitoria-sto-antao-261640701V-26
                    $accessToken = 'x68gM4mY8WiRj9LUecTi';
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

<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class Pina extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:pina';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pegar os dados do pluvimetro do Pina do banco de dados da apac e mandar para o thingsboard';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //criando variável de hora e data para requisição
        $data = date('d-m-Y');
        $hora = date('H:i:s');
        $dateHour = $data.' '.$hora;
        $timestamp = strtotime($dateHour);
        $timestamp = $timestamp*1000;

        //enviando dados de 15min para o thingsboard
        $quinzeMin = json_encode(DB::connection('another')->select("SELECT min15 FROM pluviometria_apac.mon_estacao_ultimo_dado_chuva WHERE estacao_id = 1264"));
        $quinze =((double) (substr($quinzeMin, 11, -3)));
        
        $url = 'http://172.16.68.21:8080/api/v1/XdJL0nABZoXGq5RjwPrS/telemetry';
        $client = new Client();
        $result = $client->request('POST',$url, [
            'json' => ['ts' => $timestamp, 'values' => ['15 minutos' => $quinze]]
        ]);

        //enviando dados de 30min para o thingsboard
        $trintaMin = json_encode(DB::connection('another')->select("SELECT min30 FROM pluviometria_apac.mon_estacao_ultimo_dado_chuva WHERE estacao_id = 1264"));
        $trinta =((double) (substr($trintaMin, 11, -3)));
        
        $url = 'http://172.16.68.21:8080/api/v1/XdJL0nABZoXGq5RjwPrS/telemetry';
        $client = new Client();
        $result = $client->request('POST',$url, [
            'json' => ['ts' => $timestamp, 'values' => ['30 minutos' => $trinta]]
        ]);

        //enviando dados de 60min para o thingsboard
        $umaHora = json_encode(DB::connection('another')->select("SELECT min60 FROM pluviometria_apac.mon_estacao_ultimo_dado_chuva WHERE estacao_id = 1264"));
        $uma =((double) (substr($umaHora, 11, -3)));
        
        $url = 'http://172.16.68.21:8080/api/v1/XdJL0nABZoXGq5RjwPrS/telemetry';
        $client = new Client();
        $result = $client->request('POST',$url, [
            'json' => ['ts' => $timestamp, 'values' => ['1 hora' => $uma]]
        ]);

        //enviando dados de 120min para o thingsboard
        $duasHoras = json_encode(DB::connection('another')->select("SELECT min120 FROM pluviometria_apac.mon_estacao_ultimo_dado_chuva WHERE estacao_id = 1264"));
        $duas =((double)(substr($duasHoras, 12, -3)));
        
        $url = 'http://172.16.68.21:8080/api/v1/XdJL0nABZoXGq5RjwPrS/telemetry';
        $client = new Client();
        $result = $client->request('POST',$url, [
            'json' => ['ts' => $timestamp, 'values' => ['2 horas' => $duas]]
        ]);

        //enviando dados de 180min para o thingsboard
        $tresHoras = json_encode(DB::connection('another')->select("SELECT min180 FROM pluviometria_apac.mon_estacao_ultimo_dado_chuva WHERE estacao_id = 1264"));
        $tres =((double) (substr($tresHoras, 12, -3)));
        
        $url = 'http://172.16.68.21:8080/api/v1/XdJL0nABZoXGq5RjwPrS/telemetry';
        $client = new Client();
        $result = $client->request('POST',$url, [
            'json' => ['ts' => $timestamp, 'values' => ['3 horas' => $tres]]
        ]);

        //enviando dados de 360min para o thingsboard
        $seisHoras = json_encode(DB::connection('another')->select("SELECT min360 FROM pluviometria_apac.mon_estacao_ultimo_dado_chuva WHERE estacao_id = 1264"));
        $seis =((double) (substr($seisHoras, 12, -3)));
        
        $url = 'http://172.16.68.21:8080/api/v1/XdJL0nABZoXGq5RjwPrS/telemetry';
        $client = new Client();
        $result = $client->request('POST',$url, [
            'json' => ['ts' => $timestamp, 'values' => ['6 horas' => $seis]]
        ]);

        //enviando dados de 720min para o thingsboard
        $dozeHoras = json_encode(DB::connection('another')->select("SELECT min720 FROM pluviometria_apac.mon_estacao_ultimo_dado_chuva WHERE estacao_id = 1264"));
        $doze =((double) (substr($dozeHoras, 12, -3)));
        
        $url = 'http://172.16.68.21:8080/api/v1/XdJL0nABZoXGq5RjwPrS/telemetry';
        $client = new Client();
        $result = $client->request('POST',$url, [
            'json' => ['ts' => $timestamp, 'values' => ['12 horas' => $doze]]
        ]);

        //enviando dados de 1440min para o thingsboard
        $umDia = json_encode(DB::connection('another')->select("SELECT min1440 FROM pluviometria_apac.mon_estacao_ultimo_dado_chuva WHERE estacao_id = 1264"));
        $dia =((double) (substr($umDia, 13, -3)));
        
        $url = 'http://172.16.68.21:8080/api/v1/XdJL0nABZoXGq5RjwPrS/telemetry';
        $client = new Client();
        $result = $client->request('POST',$url, [
            'json' => ['ts' => $timestamp, 'values' => ['24 horas' => $dia]]
        ]);
    }
}

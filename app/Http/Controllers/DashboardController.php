<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\Models\Pluviometria;
use App\Models\Pluviometro;
use Mapper;

class DashboardController extends Controller
{
    public function index(){

    
		$pluviometros = Pluviometro::all();
		$array = [];
	    foreach ($pluviometros as $dados) {
	      	$total = Pluviometria::where('pluviometro_id', '=', $dados->id)->sum('lamina');
	      	array_push($array, $total);
	    }

   	 	return view('dashboard', compact('pluviometros', 'array'));
    }

    public function showByDate(Request $request){

    	$lava = new Lavacharts;
    	$data = $lava->DataTable();

    	$pluviometros = Pluviometro::all();

		$data->addStringColumn('Pluviometria')->addNumberColumn('Lamina Colhida');

	    foreach ($pluviometros as $dados) {
	      	$total = Pluviometria::whereBetween('data',array( $request->date_one, $request->date_two))->where('pluviometro_id', '=', $dados->id)->sum('lamina');
	      	$data->addRow([$dados->pluviometroId,   $total]);
	    }

		$lava->BarChart('Pluviometria', $data, [
 	  		 'title' => 'Pluviometria',
 	  		 'colors' => ['#0091ea']
		], 'pluv-div');


    	return view('dashboard',["lava" =>$lava]);

    }
}

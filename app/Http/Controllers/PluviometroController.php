<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelo;
use App\Models\Pluviometro;

class PluviometroController extends Controller
{
    
	public function create(){

		$all = Modelo::all();

		return view('pluviometro', compact('all'));
	}

	public function store(Request $request){

		$pluviometro = new Pluviometro;
		$all = Modelo::all();

		$pluviometro->pluviometroId = $request->nome;
		$pluviometro->data_instalacao = $request->data;
		$pluviometro->latitude = $request->latitude;
		$pluviometro->longitude = $request->longitude;
		$pluviometro->modelo_id = $request->tipo;

		$pluviometro->save();

		return redirect()->back()->with('message', 'Pluviometro cadastrado!')->with('data', $all);
	}	

}
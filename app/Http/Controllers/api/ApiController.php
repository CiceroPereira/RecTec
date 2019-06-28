<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pluviometria;
use App\Models\Pluviometro;
use Illuminate\Support\Facades\DB;

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
}

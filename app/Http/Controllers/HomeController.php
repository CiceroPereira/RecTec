<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pluviometro;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = DB::table('pluviometro')->get();
        $tipo = DB::table('modelo')->get();
        $medidor = DB::table('usuario_pluviometro')->where('usuario_id', '=', Auth::user()->id)->get();
        // dd($medidor);
        return view('home', compact('all','tipo', 'medidor'));
    }
}

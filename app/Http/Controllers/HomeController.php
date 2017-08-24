<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quarto;
use App\Reservas;
use App\Http\Requests\ReservaRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quartos = quarto::all();
        return view('home.index', compact('quartos'));
    }

    public function mostrar($id) {
        $quarto = quarto::where('id',$id)->firstOrFail();
        $imagens = $quarto->imagens()->get();
        return view('home.quarto', compact('imagens', 'quarto'));
    }

    public function reservar(ReservaRequest $request) {
        
        $request['data_inicio'] = $this->getDate($request['data_inicio']);
        $request['data_fim'] = $this->getDate($request['data_fim']);

        $res = Reservas::create($request->all());

        return $res;
    }

    private function getDate($data) {
        $data_inicio = str_replace('/','-',$data);
        $data_inicio = strtotime($data_inicio);
        $data_inicio = date('Y-m-d',$data_inicio);
        
        return $data_inicio;
    }
}

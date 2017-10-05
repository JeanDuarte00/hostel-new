<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quarto;
use App\Reservas;
use App\Http\Requests\ReservaRequest;
use Illuminate\Support\Facades\DB;

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
        $quartos = quarto::where('ativo',1)->get();
        return view('home.index', compact('quartos'));
    }

    public function pesquisa()
    {
        
    }

    public function mostrar($id) {
        
        $quarto = quarto::where('id',$id)->firstOrFail();
        $imagens = $quarto->imagens()->get();
        return view('home.quarto', compact('imagens', 'quarto'));
    }

    public function reservar(ReservaRequest $request) 
    {
        
        $request->data_inicio = $this->getDate($request->data_inicio);
        $request->data_fim = $this->getDate($request->data_fim);
        
        $result = DB::select("select q.* from quartos q, reservas r where q.id = r.quarto_id and r.data_inicio >= ? and r.data_fim <= ? and q.id = ?; ", [$request->data_inicio, $request->data_fim, $request->quarto_id]);
        if(count($result) > 0) 
        {
            return $this->mostrar($request->quarto_id);
        }
        
        $reserva['data_inicio'] = $this->getDate($request->data_inicio);
        $reserva['data_fim'] = $this->getDate($request->data_fim);
        $reserva['quarto_id'] = $request->quarto_id;
        $reserva['valor'] = $request->valor;
        
        $res = Reservas::create($reserva);

        return $res;
    }

    private function getDate($data) {
        $data_inicio = str_replace('/','-',$data);
        $data_inicio = strtotime($data_inicio);
        $data_inicio = date('Y-m-d',$data_inicio);
        
        return $data_inicio;
    }
}

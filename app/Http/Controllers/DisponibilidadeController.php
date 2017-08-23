<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quarto;
use App\Disponibilidade;
use App\Http\Requests\DisponibilidadeRequest;
use Illuminate\Support\Facades\DB;

class DisponibilidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quartos = quarto::all();
        return view('disponibilidade.index', compact('quartos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function criar($id)
    {
        $quarto = quarto::where('id',$id)->firstOrFail();
        
        $disponibilidades = disponibilidade::all();

        return view('disponibilidade.criar', compact('quarto', 'disponibilidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(DisponibilidadeRequest $request)
    {
        $disp = Disponibilidade::create($request->all());

        return $this->index();
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

    public function iniciarEditar($idQuarto, $idDisponibilidade) {
       $quarto = quarto::where('id',$idQuarto)->firstOrFail();
       $disp = disponibilidade::where('id',$idDisponibilidade)->firstOrFail();

       return view('disponibilidade.editar', compact('quarto', 'disp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar(DisponibilidadeRequest $request)
    {
        $disp = new Disponibilidade($request->all());
        $result = DB::update('update disponibilidades set valor = ?, data_inicio = ?, data_fim = ? where id = ?',[$disp->valor, $disp->data_inicio, $disp->data_fim, $disp->id]);
        return $this->criar($disp->quarto_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletar($id)
    {
        Disponibilidade::destroy($id);   

        return $this->index();
    }

    private function convertToDate($date) {
        
        return date($date);
    }
}

<?php

namespace App\Http\Controllers;

use Request;
use App\Quarto;
use App\imagem_quarto;
use App\Http\Requests\UploadRequest;

class QuartosController extends Controller
{

    protected $redirectIndex = "/dashboard/quartos";

    public function index() 
    {
		
		$quartos = quarto::where('ativo',1)->get();
        
		return view('quartos.index', compact('quartos'));
	}

    public function iniciarSalvar() 
    {

        $quarto = new Quarto();
        return view('quartos.salvar', compact('quarto'));
    }

    public function iniciarEditar($id){

        $quarto = quarto::find($id)->get()[0];
        
        return view('quartos.salvar', compact('quarto'));
    }

    public function salvar(UploadRequest $request) 
    {
        if($request->id){
            $quarto = quarto::find($request->id);
            $quarto->fill($request->all());
            $quarto->save();
            
        }else {
            $quarto = Quarto::create($request->all());
            foreach ($request->photos as $foto) {
                $filename = $foto->store('photos');
                imagem_quarto::create([
                    'quarto_id' => $quarto->id,
                    'imagem' => $filename
                ]);
            }
        }
        return redirect('/dashboard/quartos');	
    }

    public function deletar($id)
    {
        $quarto = quarto::find($id);
        $quarto->ativo = 0;
        $quarto->save();
        return redirect($this->redirectIndex);
    }
}

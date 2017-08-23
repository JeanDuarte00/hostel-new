<?php

namespace App\Http\Controllers;

use Request;
use App\Quarto;
use App\imagem_quarto;
use App\Http\Requests\UploadRequest;

class QuartosController extends Controller
{
    public function index() {
		
		$quartos = quarto::all();

		return view('quartos.index', compact('quartos'));
	}

    public function iniciarSalvar() {

        return view('quartos.salvar');
    }

    public function salvar(UploadRequest $request) {
        $quarto = Quarto::create($request->all());
        foreach ($request->photos as $foto) {
            $filename = $foto->store('photos');
            imagem_quarto::create([
                'quarto_id' => $quarto->id,
                'imagem' => $filename
            ]);
        }
        
        return redirect('/home');	
    }
}

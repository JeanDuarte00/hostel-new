<?php

namespace App\Http\Controllers;

use Request;
use App\Quarto;
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
        dd("Chamou aqui");
        $quarto = Quarto::create($request->all());
        foreach ($request->fotos as $foto) {
            $filename = $foto->store('photos');
        }
        return 'Upload successful!';
    }
}

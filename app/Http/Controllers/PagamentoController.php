<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class PagamentoController extends Controller
{
    public $pagSeguro = 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions/';
    
    public function index()
    {
        
        $response = Curl::to($this->pagSeguro)
        ->withData( array( 'email' => 'matheus.lubarino1@gmail.com', 'token' => '46DCB972D4E04E6183C09675C3DAC219' ) )
        ->post();

        $xml = simplexml_load_string($response);
        $token = (string)$xml->id;
        return view('pagamento.index', compact('token'));
    }

    

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quarto;

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
        return view('home.quarto', compact('imagens'));
    }
}

@extends('layouts.home-layout')

@section('content')

   <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">{{$quarto->nome}}</h1>
        <p class="lead text-muted">{{$quarto->descricao_simples}}</p>
        <p>Valor: R${{$quarto->valor}}<p>
      </div>
    </section>
    
    <div class="row">
        
        @foreach($imagens as $img)
        <div class="col-md-3">
            <img src="http://localhost:8000/storage/{{$img->imagem}}" alt="100%x280" style="height: 280px; width: 100%; display: block;" data-holder-rendered="true">    
        </div>    
        @endforeach
        
    </div>
        

    
    <form action="/home/quarto/salvar" method="post" style="margin-top:100px;">
        {{ csrf_field() }}
                <label>Data inicio</label>
                <input type="text" name="data_inicio" class="form-control daterange" value="" />
        
                <label>Data fim</label>
                <input type="text" name="data_fim" class="form-control daterange" value="" />
        

                <input type="hidden" name="quarto_id" value="{{$quarto->id}}">
                <input type="hidden" name="valor" value="{{$quarto->valor}}">

                <div style="margin-bottom:200px; margin-top:100px">
                <button class="btn btn-success" type="submit">Reservar</button>
                </div>
        

        <input type="hidden" name="quarto_id" value="{{$quarto->id}}">
        <input type="hidden" name="valor" value="{{$quarto->valor}}">
    <form>

@endsection
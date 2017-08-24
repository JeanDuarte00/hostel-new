@extends('layouts.home-layout')

@section('content')

   <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">Hostel Recife</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
        <p>
          <a href="#" class="btn btn-primary">Ver todos os quartos</a>
        </p>
      </div>
    </section>

    <div class="album text-muted">
      
    <h3>Alguns quarto</h3>
        <div class="container">

            @foreach($imagens as $img)
            <div class="row">
                <div class="card">
                    <img src="http://localhost:8000/storage/{{$img->imagem}}" alt="100%x280" style="height: 280px; width: 100%; display: block;" data-holder-rendered="true">
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <input type="text" name="daterange" value="" />
    <input type="text" name="daterange2" value="" />

@endsection
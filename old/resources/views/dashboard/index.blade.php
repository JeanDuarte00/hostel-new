@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>DashBoard</h1>
    <div class="row">
      <div class="col-sm-2">
        <label>Reservas</label>
        <br/>
        <a href="#"><i class="fa fa-5x fa-pencil-square-o"></i></a>
      </div>
      <div class="col-sm-2">
        <label>Quartos</label>
        <br/>
        <a href="#"><i class="fa fa-5x fa-bed"></i></a>
      </div>
    </div>
  </div>

@endsection
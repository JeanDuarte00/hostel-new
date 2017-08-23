@extends('layouts.app')

@section('content')

    <h3>Quarto: {{$quarto['nome']}}</h3>

    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/disponibilidade/editar" method="post">
        {{ csrf_field() }}
        <input type="hidden" value="{{$quarto['id']}}" name="quarto_id"/>
        <input type="hidden" value="{{$disp['id']}}" name="id"/>
        <div class="form-group">
            <label for="data_inicio">Data Inicio</label>
            <input type="date" name="data_inicio" class="form-control" id="data_inicio" value="{{$disp['data_inicio']}}">
        </div>

        <div class="form-group">
            <label for="data_fim">Data Fim</label>
            <input type="date" name="data_fim" class="form-control" id="data_fim" value="{{$disp['data_fim']}}">
        </div>

        <div class="form-group">
            <label for="valor">Valor do quarto</label>
            <input type="number" name="valor" class="form-control" id="valor" value="{{$disp['valor']}}">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <button type="reset" class="btn btn-info">Limpar</button>
    </form>

@endsection
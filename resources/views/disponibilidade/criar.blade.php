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

    <form action="/disponibilidade/salvar" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="data_inicio">Data Inicio</label>
            <input type="date" name="data_inicio" class="form-control" id="data_inicio">
        </div>

        <div class="form-group">
            <label for="data_fim">Data Fim</label>
            <input type="date" name="data_fim" class="form-control" id="data_fim">
        </div>

        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="number" name="valor" class="form-control" id="valor">
        </div>

        <div class="form-group">
            <label for="valor">Valor do quarto</label>
            <input type="number" name="valor" class="form-control" id="valor">
        </div>

        <div class="form-group">
            <label for="photos">Upload de arquivos</label>
            <input type="file" name="photos[]" class="form-control" id="photos" multiple>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>

    <br><br><br>

     <table class="table table-striped table-bordered">
        
        <thead>
            <tr>
                <th>Valor</th>
                <th>Data inicio</th>
                <th>Data fim</th>
                <th>Ações</th>
            <tr>
        </thead>

        <tbody>
        @foreach($disponibilidades as $disp)
            <tr>
                <td>{{$disp['valor']}}</td>
                <td>{{$disp['data_inicio']}}</td>
                <td>{{$disp['data_fim']}}</td>
                <td><a class="btn btn-success" href="/disponibilidade/add/{{$quarto['id']}}">Adicionar período</a>
                    <a class="btn btn-info" href="/disponibilidade/view/{{$quarto['id']}}">Visualizar</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
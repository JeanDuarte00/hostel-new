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

    <form action="/dashboard/disponibilidade/salvar" method="post">
        {{ csrf_field() }}
        <input type="hidden" value="{{$quarto['id']}}" name="quarto_id"/>
        <div class="form-group">
            <label for="data_inicio">Data Inicio</label>
            <input type="date" name="data_inicio" class="form-control" id="data_inicio">
        </div>

        <div class="form-group">
            <label for="data_fim">Data Fim</label>
            <input type="date" name="data_fim" class="form-control" id="data_fim">
        </div>

        <div class="form-group">
            <label for="valor">Valor do quarto</label>
            <input type="number" name="valor" class="form-control" id="valor">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <button type="reset" class="btn btn-info">Limpar</button>
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
                <td>
                    <a class="btn btn-success" href="/dashboard/disponibilidade/deletar/{{$disp['id']}}">Deletar</a>
                    <a class="btn btn-success" href="/dashboard/disponibilidade/editar/{{$quarto['id']}}/{{$disp['id']}}">Editar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
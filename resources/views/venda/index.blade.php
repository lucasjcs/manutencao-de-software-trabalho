@extends('layouts.app')
@section('content')
    <h1 >Relatório de Vendas</h1>
    <hr style="clear: both" />

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Data da Venda</th>
            <th>Produto</th>
            <th>Comprador</th>
            <th>Quantidade</th>
        </tr>
        </thead>
        <tbody>

        @foreach($vendas as $venda)
            <tr>
                <th scope="row">{{ $venda->created_at }}</th>
                <td>{{ $venda->produto->nome }}</td>
                <td>{{ $venda->fornecedor->nome }}</td>
                <td>{{ $venda->quantidade }}</td>

            </tr>
        @endforeach

        </tbody>
    </table>

@endsection

@extends('layouts.app')
@section('content')
    <a class="btn btn-success" style="float: right; margin-top: 30px;" href="{{ route('produtos.create') }}" role="button">Adicionar novo</a>
    <h1 >Lista de Produtos</h1>
    <hr style="clear: both" />

    @if(Session::get('adicionado'))
    <div class="alert alert-success">
    Novo <strong>Produto</strong> inserido com sucesso!
    </div>
    @endif

    @if(Session::get('atualizado'))
    <div class="alert alert-info">
        <strong>Produto</strong> atualizado com sucesso!
    </div>
    @endif

     @if(Session::get('deletado'))
    <div class="alert alert-danger">
        O produto <strong>{{ Session::get('deletado') }}</strong> foi deletado com sucesso!
    </div>
    @endif

    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>

        @foreach($produtos as $produto)
        <tr>
            <th scope="row">{{ $produto->id }}</th>
            <td>{{ $produto->nome }}</td>
            <td>R${{ $produto->preco }}</td>
            <td>{{ $produto->quantidade }}</td>
            <td>

                <form action="{{ route('produtos.destroy', ['id'=>$produto->id]) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <a class="btn btn-primary" href="{{ route('produtos.edit', ['id'=>$produto->id]) }}" role="button">Editar</a>
                    <button class="btn btn-danger" role="button">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>

@endsection

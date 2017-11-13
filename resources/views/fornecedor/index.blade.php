@extends('layouts.app')
@section('content')
    <a class="btn btn-success" style="float: right; margin-top: 30px;" href="{{ route('fornecedors.create') }}" role="button">Adicionar novo</a>
    <h1 >Lista de Fornecedores</h1>
    <hr style="clear: both" />

        @if(Session::get('adicionado'))
          <div class="alert alert-success">
            Novo <strong>Fornecedor</strong> inserido com sucesso!
         </div>
        @endif

        @if(Session::get('atualizado'))
        <div class="alert alert-info">
            <strong>Fornecedor</strong> atualizado com sucesso!
        </div>
        @endif

         @if(Session::get('deletado'))
        <div class="alert alert-danger">
            O fornecedor <strong>{{ Session::get('deletado') }}</strong> foi deletado com sucesso!
        </div>
        @endif

    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>

        @foreach($fornecedores as $fornecedor)
        <tr>
            <th scope="row">{{ $fornecedor->id }}</th>
            <td>{{ $fornecedor->nome }}</td>
            <td>{{ $fornecedor->email }}</td>
            <td>
                <form action="{{ route('fornecedors.destroy', ['id'=>$fornecedor->id]) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <a class="btn btn-primary" href="{{ route('fornecedors.edit', ['id'=>$fornecedor->id]) }}" role="button">Editar</a>
                    <button class="btn btn-danger" role="button">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection

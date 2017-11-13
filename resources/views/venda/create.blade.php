@extends('layouts.app')
@section('content')
    <h1>Vender Produto</h1>
    @if(Session::get('vendido'))
    <div class="alert alert-success" role="alert">
        Venda realizada com sucesso!
    </div>
    @endif
    <hr />
    {!! form($form) !!}

@endsection
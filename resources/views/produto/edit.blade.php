@extends('layouts.app')
@section('content')
    <h1>Editar Produto: {{ $produto->nome }}</h1>
    <hr />
    {!! form($form) !!}
@endsection
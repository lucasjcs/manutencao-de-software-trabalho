@extends('layouts.app')
@section('content')
    <h1>Editar Fornecedor: {{ $fornecedor->nome }}</h1>
    <hr />
    {!! form($form) !!}
@endsection
@extends('layout.layout')

@section('titulo', 'Contatos')

@section('conteudo')

@include('layout.mensagem', ['mensagem' => $mensagem])

<p>
    <a href="{{ route('contato.create')}}" class="btn btn-primary btn-sm"><i class="bi bi-plus"></i></a>
</p>


{!! $dataTable->table() !!}

{!! $dataTable->scripts() !!}

@endsection
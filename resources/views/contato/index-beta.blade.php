@extends('layout.layout')

@section('titulo', 'Contatos')

@section('conteudo')

<p class="mt-2">
    <a href="{{ route('contato.create')}}" class="btn btn-primary btn-sm"><i class="bi bi-plus"></i></a>
</p>


{!! $dataTable->table() !!}

{!! $dataTable->scripts() !!}

@endsection
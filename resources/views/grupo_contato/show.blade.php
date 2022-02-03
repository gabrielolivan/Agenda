@extends('layout.layout')

@section('titulo', 'Grupo de contato')

@section('conteudo')

<div class="card-body">
    
    <form action="{{ route('grupo_contato.destroy', $grupoContato) }}" method="post" onsubmit="return confirm('Você tem certeza?')">
        @csrf
        @method('DELETE')
        <div>
            <h3 class="card-title mb-1">{{ $grupoContato->nome }}
                <a href="{{ route('grupo_contato.edit', $grupoContato) }}" class="btn btn-sm"><i class="bi bi-pencil"></i></a>
            <button type="submit" class="btn btn-sm text-danger"><i class="bi bi-trash"></i></a>
            </h3>
            <h6 class="card-title mb-3">{{ $grupoContato->descricao }}</h6>    
        </div>
    </form>
    
    
    {{-- Contatos --}}
    <div class="card-body mb-3">
        <h5 class="card-title">Contatos</h5>
        @forelse ($grupoContato->contatos as $contato)
        <div class="card-body mb-1 border rounded">
            <div class="row">
                <div class="col-md-4"><strong>Nome: </strong><span>{{ $contato->nome }}</span></div>
                <div class="col-md-4"><strong>Email: </strong><span class="text-wrap">{{ $contato->email }}</span></div>
                <div class="col-md-4"><a href="{{ route('contato.edit', $contato) }}"><i class="bi bi-pencil"></i></a></div>
            </div>
        </div>
        @empty
        <div class="card-body mb-1 border rounded">
            <h6>Não possui contato cadastrado</h2>
        </div>
        @endforelse

    </div>

@endsection
@extends('layout.layout')

@section('titulo', 'Contato')

@section('breadcrumb')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb bg-light fs-6 ms-3">
      <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('contato.index') }}">Contatos</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $contato->nome }}</li>
    </ol>
  </nav>
@endsection

@section('conteudo')


@include('layout.mensagem', ['mensagem' => $mensagem])

<div class="card-body">
    
    <form action="{{ route('contato.destroy', $contato) }}" method="post">
        @csrf
        @method('DELETE')
        <div>
            <h3 class="card-title mb-1">{{ $contato->nome }}
                <a href="{{ route('contato.edit', $contato) }}" class="btn btn-sm"><i class="bi bi-pencil"></i></a>
            <button type="submit" class="btn btn-sm text-danger"><i class="bi bi-trash"></i></a>
            </h3>
            <h6 class="card-title mb-3">{{ $contato->email }}</h6>    
        </div>
    </form>
    
    
    {{-- Endereços --}}
    <div class="card-body mb-3">
        <h5 class="card-title">Endereços <a href="{{ route('contato.endereco.create', $contato, $contato->endereco) }}"><i class="bi bi-plus"></i></a></h5>
        @forelse ($contato->enderecos as $endereco)
        <div class="card-body mb-1 border rounded">
            <div class="row">
                <div class="col-md-2"><strong>País: </strong><span>{{ $endereco->pais }}</span></div>
                <div class="col-md-6"><strong>Estado: </strong><span>{{ $endereco->estado }}</span></div>
                <div class="col-md-4"><strong>Cidade: </strong><span>{{ $endereco->cidade }}</span></div>
            </div>
            <div class="row">
                <div class="col-md-2"><strong>Bairro: </strong><span>{{ $endereco->bairro }}</span></div>
                <div class="col-md-6"><strong>Logradouro: </strong><span>{{ $endereco->logradouro }}</span></div>
                <div class="col-md-4"><strong>Número: </strong><span>{{ $endereco->numero }}</span></div>
            </div>
            <div class="row">
                <div class="col-md-2"><strong>Cep: </strong><span>{{ $endereco->cep }}</span></div>
                <div class="col-md-8"><strong>Descrição: </strong><span class="text-wrap">{{ $endereco->descricao }}</span></div>
                <form action="{{ route('contato.endereco.destroy', [$contato, $endereco]) }}" method="post" class="col-md-2">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('contato.endereco.edit', [$contato, $endereco]) }}"><i class="bi bi-pencil"></i></a>
                    <button type='submit' class="btn"><i class="bi bi-trash text-danger"></i></button>
                </form>
            </div>
        </div>
        @empty
        <div class="card-body mb-1 border rounded">
            <h6>Não possui endereço cadastrado</h2>
        </div>
        @endforelse

    </div>

    {{-- Telefones --}}
    <div class="card-body mb-3">
        <h5 class="card-title">Telefones <a href="{{ route('contato.telefone.create', $contato, $contato->telefone) }}"><i class="bi bi-plus"></i></a></h5>
        @forelse ($contato->telefones as $telefone)
        <div class="card-body mb-1 border rounded">
            <div class="row">
                <div class="col-md-2"><strong>Número: </strong><span>{{ $telefone->numero }}</span></div>
                <div class="col-md-8"><strong>Descrição: </strong><span class="text-wrap">{{ $telefone->descricao }}</span></div>
                <form action="{{ route('contato.telefone.destroy', [$contato, $telefone]) }}" method="post" class="col-md-2">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('contato.telefone.edit', [$contato, $telefone]) }}"><i class="bi bi-pencil"></i></a>
                    <button type='submit' class="btn"><i class="bi bi-trash text-danger"></i></button>
                </form>
            </div>
        </div>
        @empty
        <div class="card-body mb-1 border rounded">
            <h6>Não possui telefone cadastrado</h2>
        </div>
        @endforelse

    </div>

</div>


@endsection
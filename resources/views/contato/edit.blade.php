@extends('layout.layout')

@section('titulo', 'Editar contato')

@section('breadcrumb')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb bg-light fs-6 ms-3">
      <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('contato.index') }}">Contatos</a></li>
      <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('contato.show', $contato) }}">{{ $contato->nome }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">Editar contato</li>
    </ol>
  </nav>
@endsection

@section('conteudo')

<form action="{{ route('contato.update', $contato) }}" method="post">
    @csrf
    @method("PATCH")
    {{-- Contato --}}
    <div class="card-body mb-3">
        <h5 class="card-title">Contato</h5>
        <x-input name="nome" id="nome" :value="old('nome', $contato->nome)" span="Nome" required='true'/>
    </div>

    {{-- Endereços --}}
    <div class="card-body mb-3">
        <h5 class="card-title">Endereços</h5>
        @forelse ($contato->enderecos as $endereco)
        <div class="card-body mb-1 border rounded">
            <x-input name="pais_endereco{{$endereco->id}}" id="pais_endereco{{$endereco->id}}" :value="old('pais_endereco{{$endereco->id}}', $endereco->pais)" span="País" erro="Escreve direito o País DIAXO!!!"/>
            <x-input name="estado_endereco{{$endereco->id}}" id="estado_endereco{{$endereco->id}}" :value="old('estado_endereco{{$endereco->id}}', $endereco->estado)" span="Estado" />
            <x-input name="cidade_endereco{{$endereco->id}}" id="cidade_endereco{{$endereco->id}}" :value="old('cidade_endereco{{$endereco->id}}', $endereco->cidade)" span="Cidade" />
            <x-input name="bairro_endereco{{$endereco->id}}" id="bairro_endereco{{$endereco->id}}" :value="old('bairro_endereco{{$endereco->id}}', $endereco->bairro)" span="Bairro" />
            <x-input name="logradouro_endereco{{$endereco->id}}" id="logradouro_endereco{{$endereco->id}}" :value="old('logradouro_endereco{{$endereco->id}}', $endereco->logradouro)" span="Logradouro" />
            <x-input name="numero_endereco{{$endereco->id}}" id="numero_endereco{{$endereco->id}}" :value="old('numero_endereco{{$endereco->id}}', $endereco->numero)" span="Número" />
            <x-input name="cep_endereco{{$endereco->id}}" id="cep_endereco{{$endereco->id}}" :value="old('cep_endereco{{$endereco->id}}', $endereco->cep)" span="CEP" />
            <x-input name="descricao_endereco{{$endereco->id}}" id="descricao_endereco{{$endereco->id}}" :value="old('descricao_endereco{{$endereco->id}}', $endereco->descricao)" span="Descrição do endereço" />
        </div>
        @empty
        <div class="card-body mb-1 border rounded-pill">
            <h6>Não possui endereço cadastrado</h2>
        </div>
        @endforelse

    </div>

    {{-- Telefones --}}
    <div class="card-body mb-3">
        <h5 class="card-title">Telefones</h5>
        @forelse ($contato->telefones as $telefone)
        <div class="card-body mb-1 border rounded">
            <x-input name="telefone{{ $telefone->id }}" id="telefone{{ $telefone->id }}" :value="old('telefone{{ $telefone->id }}', $telefone->numero)" span="Telefone" />
            <x-input name="descricao_telefone{{ $telefone->id }}" id="descricao_telefone{{ $telefone->id }}" :value="old('descricao_telefone{{ $telefone->id }}', $telefone->descricao)" span="Descrição do telefone" />
        </div>
        @empty
        <div class="card-body mb-1 border rounded-pill">
            <h6>Não possui telefone cadastrado</h2>
        </div>
        @endforelse

    </div>
    
    <button class="btn btn-primary">Salvar</button>
</form>

@endsection
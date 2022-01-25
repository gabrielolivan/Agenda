@extends('layout.layout')

@section('titulo', 'Criar contato')

@section('breadcrumb')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb bg-light fs-6 ms-3">
      <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('contato.index') }}">Contatos</a></li>
      <li class="breadcrumb-item active" aria-current="page">Criar contato</li>
    </ol>
  </nav>
@endsection

@section('conteudo')

<form action="{{ route('contato.store') }}" method="post">
    @csrf
    {{-- Contato --}}
    <x-input name="nome" id="nome" :value="old('nome')" span="Nome" required='true'/>

    {{-- Endereço --}}
    <x-input name="pais_endereco" id="pais_endereco" :value="old('pais_endereco')" span="País" />
    <x-input name="estado_endereco" id="estado_endereco" :value="old('estado_endereco')" span="Estado" />
    <x-input name="cidade_endereco" id="cidade_endereco" :value="old('cidade_endereco')" span="Cidade" />
    <x-input name="bairro_endereco" id="bairro_endereco" :value="old('bairro_endereco')" span="Bairro" />
    <x-input name="logradouro_endereco" id="logradouro_endereco" :value="old('logradouro_endereco')" span="Logradouro" />
    <x-input name="numero_endereco" id="numero_endereco" :value="old('numero_endereco')" span="Número" />
    <x-input name="cep_endereco" id="cep_endereco" :value="old('cep_endereco')" span="CEP" />
    <x-input name="descricao_endereco" id="descricao_endereco" :value="old('descricao_endereco')" span="Descrição do endereço" />
    
    {{-- Telefone --}}
    <x-input name="telefone" id="telefone" :value="old('telefone')" span="Telefone" />
    <x-input name="descricao_telefone" id="descricao_telefone" :value="old('descricao_telefone')" span="Descrição do telefone" />
    
    <button class="btn btn-primary">Criar</button>
</form>

@endsection
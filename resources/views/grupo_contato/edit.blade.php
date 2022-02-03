@extends('layout.layout')

@section('titulo', 'Editar grupo de contato')

@section('breadcrumb')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb bg-light fs-6 ms-3">
      <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('grupo_contato.index') }}">Grupo de contatos</a></li>
      <li class="breadcrumb-item active" aria-current="page">Editar grupo de contato</li>
    </ol>
  </nav>
@endsection


@section('conteudo')

<p>
    <h4>Editar grupo de contatos</h4>
</p>


<form action="{{ route('grupo_contato.update', $grupoContato) }}" method="post">
    @csrf
    @method("PATCH")
    <div class="form-group">
        <x-input name="nome" id="nome" :value="old('nome', $grupoContato->nome)" span="Nome" required='true'/>
        <x-input name="descricao" id="descricao" :value="old('descricao', $grupoContato->descricao)" span="Descrição"/>
        

        <div class="input-group mt-3">
            <label class="input-group col-md-2" for="contatos">Contatos</label> 
            <select required="true" class="input-group-text"name="contatos[]" id="contatos" multiple>
                
                @foreach($contatos as $id => $nome)
                <option value="{{$id}}" 
                    @if(old('contatos'))
                    {{in_array($id, old('contatos') ?? []) ? 'selected' : ''}}
                    @else
                    {{ in_array($id, $grupoContato->contatos->pluck('id')->toArray() ?? []) ? 'selected' : ''}}
                    @endif
                >{{ $nome }}</option>
                @endforeach
    
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Salvar</button>
</form>
<script>
    $(document).ready(function() {
        $('#contatos').select2({
            width: '100%',
        });
    });
</script>
@endsection

{{-- 
    <select name="alarmes[]" class="form-control" id="alarmes" multiple>
      <option value="">Selecione as funções da torre</option>
      @foreach($torreanemometrica::funcoes() as $m)
      <option value="{{$m}}" 
      @if(old('alarmes')) {{in_array($m, old('alarmes') ?? []) ? 'selected' : ''}} 
      @else {{ in_array($m, $torreanemometrica->alarmes ?? []) ? 'selected' : ''}} @endif>{{$m}}</option>
      @endforeach
    </select>
--}}
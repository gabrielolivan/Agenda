@extends('layout.layout')

@section('titulo', 'Criar grupo de contato')

@section('breadcrumb')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb bg-light fs-6 ms-3">
      <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('grupo_contato.index') }}">Grupo de contatos</a></li>
      <li class="breadcrumb-item active" aria-current="page">Criar grupo de contato</li>
    </ol>
  </nav>
@endsection


@section('conteudo')

<p>
    <h4>Criar grupo de contatos</h4>
</p>


<form action="{{ route('grupo_contato.store') }}" method="post">
    @csrf
    <div class="form-group">
        <x-input name="nome" id="nome" :value="old('nome')" span="Nome" required='true'/>
        <x-input name="descricao" id="descricao" :value="old('descricao')" span="Descrição"/>
        <div class="input-group mt-3">
            <label class="input-group col-md-2" for="contatos">Contatos</label> 
            <select required="true" class="input-group-text"name="contatos[]" id="contatos" multiple>
                
                @foreach($contatos as $contato)
                <option value="{{$contato->id}}" 
                    @if(old('contatos'))
                    {{in_array($contato->id, old('contatos')) ? 'selected' : ''}}
                    @endif
                >{{ $contato->nome }}</option>
                @endforeach
    
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Criar</button>
</form>
<script>
    $(document).ready(function() {
        $('#contatos').select2({
            // ajax: '{{ route('grupo_contato.select2') }}',
            // dataType: 'json',
            // data: (params) => {
            //     var query = {
            //         search: params.nome,
            //     }

            //     return query;
            // },
            width: '100%',
        });
    });
</script>
@endsection

@extends('layout.layout')

@section('titulo', 'Grupo de contatos')

@section('conteudo')

@include('layout.mensagem')

<p class="mt-2">
    <a href="{{ route('grupo_contato.create')}}" class="btn btn-primary btn-sm">Criar usando bootstrap-select<i class="bi bi-plus"></i></a>
    <a href="{{ route('grupo_contato.select')}}" class="btn btn-primary btn-sm">Criar usando Select2<i class="bi bi-plus"></i></a>
</p>

<table class="table table-striped table-hover w-100" id="tabela_grupo">
    <thead>
        <tr>
            <th>Grupo</th>
            <th class="text-center">Qtd contatos</th>
            <th class="text-end">Ações</th>
        </tr>
    </thead>
</table>

<script>
    var table;
    $(function(){
        table = $('#tabela_grupo').DataTable({
            serverSide: true,
            ajax: '{{ route('grupo_contato.datatable') }}',
            "language": {
                url: 'https://cdn.datatables.net/plug-ins/1.11.4/i18n/pt_br.json',
            },
            // scrollCollapse: true,
            // scrollY: '200px',
            // paging: false,
            columns: [
                {data: 'nome'},
                {data: 'contatos_count', searchable: false, class: 'text-center'},
                {data: (row) => {
                    let showtUrl = "{{route('grupo_contato.show', 'id')}}".replace('id', row.id)
                    let editUrl = "{{route('grupo_contato.edit', 'id')}}".replace('id', row.id)
                    let deleteUrl = "{{route('grupo_contato.destroy', 'id')}}".replace('id', row.id)
                    return `
                    <form action="${deleteUrl}" onsubmit="return confirm('tem certeza?')" method="POST">
                        @method('DELETE')
                        @csrf
                        <a class="btn btn-sm btn-secondary" href="${showtUrl}"><i class="bi bi-eye"></i></a>
                        <a class="btn btn-sm btn-secondary" href="${editUrl}"><i class="bi bi-pencil"></i></a>
                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                    </form>
                    `

                }, searchable: false, orderable: false, class: 'text-end'},
                
            ]
        })
    })

</script>
@endsection



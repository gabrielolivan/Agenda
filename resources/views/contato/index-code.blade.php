@extends('layout.layout')

@section('titulo', 'Contatos')

@section('conteudo')

<p class="mt-2">
    <a href="{{ route('contato.create')}}" class="btn btn-primary btn-sm"><i class="bi bi-plus"></i></a>
</p>

<table class="table table-striped table-hover w-100" id="tabela_contato">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th class="text-center">Qtd endereços</th>
            <th class="text-center">Qtd telefones</th>
            <th class="text-center">Ações</th>
        </tr>
    </thead>
</table>

<script>
    var table;
    $(function(){
        table = $('#tabela_contato').DataTable({
            serverSide: true,
            ajax: '{{ route('contato.datatable') }}',
            "language": {
                url: 'https://cdn.datatables.net/plug-ins/1.11.4/i18n/pt_br.json',
            },
            // scrollCollapse: true,
            // scrollY: '300px',
            // paging: false,
            columns: [
                {data: 'nome'},
                {data: 'email'},
                {data: 'enderecos_count', searchable: false, class: 'text-center'},
                {data: 'telefones_count', searchable: false, class: 'text-center'},
                {data: (row) => {
                    let id = row.id
                    let showtUrl = "{{route('contato.show', 'id')}}".replace('id', id)
                    let editUrl = "{{route('contato.edit', 'id')}}".replace('id', id)
                    let deleteUrl = "{{route('contato.destroy', 'id')}}".replace('id', id)
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


